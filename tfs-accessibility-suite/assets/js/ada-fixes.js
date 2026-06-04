/**
 * Fly Shop ADA Compliance Fixes
 * Auto-fixes for missing alt tags, ARIA labels, and list structures
 */

(function($) {
    'use strict';
    
    const log = (message, data) => {
        if (window.tfsAccessibility && window.tfsAccessibility.logFixes) {
            console.log(`[ADA Fix] ${message}`, data || '');
        }
    };
    
    /**
     * Fix 1: Add missing alt attributes to images
     * NOW: Only runs if server-side missed something (dynamic content)
     */
    function fixMissingAltTags() {
        let fixedCount = 0;
        
        // Only fix images that DON'T have data-alt-auto="server"
        // (meaning server-side didn't handle them - likely dynamic content)
        $('img:not([alt]):not([data-alt-auto])').each(function() {
            const $img = $(this);
            const src = $img.attr('src') || '';
            
            // Use page title as primary fallback (matches server-side strategy)
            let altText = document.title || 'Image';
            
            // PRIORITY 1: Check for title attribute
            if ($img.attr('title')) {
                altText = $img.attr('title');
            }
            // PRIORITY 2: Check parent link text
            else if ($img.closest('a').length) {
                const linkText = $img.closest('a').text().trim();
                if (linkText && linkText.length > 2) {
                    altText = linkText;
                }
            }
            // PRIORITY 3: Check nearby heading
            else if ($img.closest('div, section, article').find('h1, h2, h3').first().length) {
                const heading = $img.closest('div, section, article').find('h1, h2, h3').first().text().trim();
                if (heading && heading.length > 2) {
                    altText = heading;
                }
            }
            
            $img.attr('alt', altText);
            $img.attr('data-alt-injected', 'client');
            fixedCount++;
            
            log(`Alt tag added (client-side): "${altText}"`, src);
        });
        
        if (fixedCount > 0) {
            log(`✅ Fixed ${fixedCount} missing alt tags (dynamic content)`);
        }
    }
    
    /**
     * Fix 2: Add ARIA labels to buttons without accessible text
     */
    function fixButtonLabels() {
        let fixedCount = 0;
        
        // Specific fixes for known buttons
        const buttonFixes = {
            '#tfs-search-close': 'Close search',
            '#customPrev': 'Previous',
            '#customNext': 'Next',
            '#search-bot-open': 'Open search assistant'
        };
        
        Object.keys(buttonFixes).forEach(selector => {
            const $btn = $(selector);
            if ($btn.length && !$btn.attr('aria-label')) {
                $btn.attr('aria-label', buttonFixes[selector]);
                fixedCount++;
                log(`Button label added: ${selector}`, buttonFixes[selector]);
            }
        });
        
        // Generic fix for icon-only buttons
        $('button:not([aria-label])').each(function() {
            const $btn = $(this);
            const text = $btn.text().trim();
            
            // Only fix if button has no text
            if (text === '' || text.length < 2) {
                const $icon = $btn.find('i, svg, .icon');
                let label = 'Button';
                
                if ($icon.length) {
                    const classes = $icon.attr('class') || '';
                    
                    // Try to guess from icon classes
                    if (classes.match(/chevron.*left|arrow.*left|prev/i)) label = 'Previous';
                    else if (classes.match(/chevron.*right|arrow.*right|next/i)) label = 'Next';
                    else if (classes.match(/close|times|x\b/i)) label = 'Close';
                    else if (classes.match(/search|magnif/i)) label = 'Search';
                    else if (classes.match(/menu|bars|hamburger/i)) label = 'Menu';
                    else if (classes.match(/play/i)) label = 'Play';
                    else if (classes.match(/pause/i)) label = 'Pause';
                }
                
                $btn.attr('aria-label', label);
                $btn.attr('data-aria-injected', 'true');
                fixedCount++;
                
                log(`Button ARIA label added: "${label}"`, $btn[0]);
            }
        });
        
        if (fixedCount > 0) {
            log(`✅ Fixed ${fixedCount} button labels`);
        }
    }
    
    /**
     * Fix 3: Fix invalid list structures
     */
    function fixListStructures() {
        let fixedCount = 0;
        
        $('ul, ol').each(function() {
            const $list = $(this);
            const children = $list[0].childNodes;
            
            Array.from(children).forEach(node => {
                // Check for text nodes with content
                if (node.nodeType === 3 && node.textContent.trim()) {
                    const $li = $('<li>').text(node.textContent.trim());
                    $(node).replaceWith($li);
                    fixedCount++;
                    log('Fixed text node in list', node.textContent.trim());
                }
                // Check for non-li, non-script elements
                else if (node.nodeType === 1 && 
                         node.tagName !== 'LI' && 
                         node.tagName !== 'SCRIPT' && 
                         node.tagName !== 'TEMPLATE') {
                    const $li = $('<li>').html($(node).html());
                    $(node).replaceWith($li);
                    fixedCount++;
                    log('Fixed invalid list child', node.tagName);
                }
            });
        });
        
        if (fixedCount > 0) {
            log(`✅ Fixed ${fixedCount} list structure issues`);
        }
    }
    
    /**
     * Fix 4: Add role="img" and aria-label to decorative SVGs
     */
    function fixSVGAccessibility() {
        let fixedCount = 0;
        
        $('svg:not([role])').each(function() {
            const $svg = $(this);
            const title = $svg.find('title').text();
            
            if (title) {
                $svg.attr('role', 'img');
                $svg.attr('aria-label', title);
            } else {
                $svg.attr('role', 'presentation');
                $svg.attr('aria-hidden', 'true');
            }
            fixedCount++;
        });
        
        if (fixedCount > 0) {
            log(`✅ Fixed ${fixedCount} SVG accessibility issues`);
        }
    }
    
    /**
     * Fix 6: iframe Missing Titles
     */
    function fixIframeTitles() {
        let fixedCount = 0;
        
        $('iframe:not([title])').each(function() {
            const $iframe = $(this);
            const src = $iframe.attr('src') || '';
            let title = 'Embedded content';
            
            // Detect iframe type from src
            if (src.includes('youtube.com') || src.includes('youtu.be')) {
                title = 'YouTube video';
            } else if (src.includes('vimeo.com')) {
                title = 'Vimeo video';
            } else if (src.includes('google.com/maps')) {
                title = 'Google Maps';
            } else if (src.includes('instagram.com')) {
                title = 'Instagram embed';
            } else if (src.includes('facebook.com')) {
                title = 'Facebook embed';
            } else if (src.includes('twitter.com') || src.includes('x.com')) {
                title = 'Twitter/X embed';
            }
            
            // Try to get more specific title from parent context
            const parentHeading = $iframe.closest('div, section, article').find('h1, h2, h3').first().text().trim();
            if (parentHeading) {
                title = title + ' - ' + parentHeading;
            }
            
            $iframe.attr('title', title);
            $iframe.attr('data-title-injected', 'true');
            fixedCount++;
            log(`iframe title added: "${title}"`, src);
        });
        
        if (fixedCount > 0) {
            log(`✅ Fixed ${fixedCount} iframe titles`);
        }
    }
    
    /**
     * Run all fixes on page load
     */
    $(document).ready(function() {
        log('🛡️ ADA Compliance Fixes Starting...');
        
        fixMissingAltTags();
        fixButtonLabels();
        fixListStructures();
        fixSVGAccessibility();
        fixIframeTitles();
        
        log('✅ All ADA fixes applied');
    });
    
    /**
     * Re-run fixes when content is dynamically loaded
     */
    if (window.MutationObserver) {
        const observer = new MutationObserver(function(mutations) {
            let shouldRerun = false;
            
            mutations.forEach(mutation => {
                if (mutation.addedNodes.length > 0) {
                    shouldRerun = true;
                }
            });
            
            if (shouldRerun) {
                log('🔄 New content detected, re-running fixes...');
                setTimeout(() => {
                    fixMissingAltTags();
                    fixButtonLabels();
                    fixListStructures();
                    fixSVGAccessibility();
                    fixIframeTitles();
                }, 100);
            }
        });
        
        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }
    
})(jQuery);
