jQuery(document).ready(function($) {
    const $prompt = $('#search-bot-prompt');
    const $chat = $('#search-bot-chat');
    const $messages = $('#search-bot-messages');
    const $input = $('#search-bot-input');
    const $openBtn = $('#search-bot-open, .search-bot-open-shortcode');
    const $closeBtn = $('#search-bot-close');
    const $clearBtn = $('#search-bot-clear');
    let history = [];

    // Open chat
    $openBtn.on('click', function() {
        $prompt.hide();
        $chat.show().css('display', 'flex');
        setTimeout(() => {
            $input.focus();
        }, 300);
    });

    // Close chat
    $closeBtn.on('click', function() {
        $chat.hide();
        $prompt.show();
    });

    // Clear chat
    $clearBtn.on('click', function() {
        if (confirm('Clear all search results and start over?')) {
            clearChat();
        }
    });

    // Function to clear chat
    function clearChat() {
        $messages.empty();
        history = [];
        $input.val('');

        // Show a fresh start message
        setTimeout(() => {
            appendMessage('Chat cleared! How can I help you today?', false);
        }, 100);
    }

    // Handle input submission
    $input.on('keypress', function(e) {
        if (e.which === 13 && $input.val().trim()) {
            const query = $input.val().trim();
            appendMessage(query, true);
            $input.val('');

            // Show loading indicator
            const $loadingMsg = $('<div class="bot-message loading">Searching</div>');
            $messages.append($loadingMsg);
            $messages.scrollTop($messages[0].scrollHeight);

            $.ajax({
                url: searchBotAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'ai_chat',
                    query: query,
                    history: JSON.stringify(history),
                    nonce: searchBotAjax.nonce
                },
                success: function(response) {
                    // Remove loading message
                    $loadingMsg.remove();

                    if (response.success) {
                        appendMessage(response.data.response, false);
                    } else {
                        const errorMsg = response.data?.response || 'Sorry, something went wrong. Please try again.';
                        appendMessage(errorMsg, false);
                        console.error('Server error:', response);
                    }
                },
                error: function(xhr, status, error) {

                    // Remove loading message
                    $loadingMsg.remove();

                    console.error('AJAX Error:', {
                        status: status,
                        error: error,
                        response: xhr.responseText,
                        xhr: xhr
                    });
                    appendMessage('Error connecting to the server. Please check the console for details.', false);
                }
            });
        }
    });

    function appendMessage(text, isUser) {
        const messageClass = isUser ? 'user-message' : 'bot-message';
        const $message = $('<div>').addClass(messageClass).html(text);
        $messages.append($message);

        if (isUser) {
            history.push({ text: text, isUser: isUser });
        }

        // Smooth scroll to bottom
        $messages.animate({
            scrollTop: $messages[0].scrollHeight
        }, 300);
    }

    // Close on escape key
    $(document).on('keydown', function(e) {
        if (e.key === 'Escape' && $chat.is(':visible')) {
            $closeBtn.click();
        }
    });
});