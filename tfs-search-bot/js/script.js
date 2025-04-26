jQuery(document).ready(function($) {
    const chatContainer = $('#search-bot-chat');
    const messagesContainer = $('#search-bot-messages');
    const inputField = $('#search-bot-input');
    let conversationHistory = [];

    // Show welcome message when chat opens
    function openChat() {
        chatContainer.show();
        if (!conversationHistory.length) {
            messagesContainer.append('<div class="bot-message">Bot: Hi! Ask about products, destinations, fishing reports, or private waters.</div>');
            scrollToBottom();
        }
        inputField.focus();
    }

    $('#search-bot-open').on('click', openChat);
    $('.search-bot-open-shortcode').on('click', openChat);

    // Close chat
    $('#search-bot-close').on('click', function() {
        chatContainer.hide();
    });

    // Scroll to bottom of messages
    function scrollToBottom() {
        messagesContainer.scrollTop(messagesContainer[0].scrollHeight);
    }

    // Handle user input
    inputField.on('keypress', function(e) {
        if (e.which === 13 && $(this).val().trim()) {
            const query = $(this).val().trim();
            messagesContainer.append('<div class="user-message">You: ' + query + '</div>');
            conversationHistory.push({ text: query, isUser: true });
            scrollToBottom();

            // Send to AI via AJAX
            $.ajax({
                url: searchBotAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'ai_chat',
                    query: query,
                    history: JSON.stringify(conversationHistory)
                },
                success: function(response) {
                    console.log('AJAX Response:', response); // Debug log
                    if (response.success) {
                        const aiResponse = response.data.response;
                        // Append response as HTML to render links
                        messagesContainer.append($('<div class="bot-message">Bot: </div>').append(aiResponse));
                        conversationHistory.push({ text: aiResponse, isUser: false });
                    } else {
                        messagesContainer.append('<div class="bot-message">Bot: Error: ' + response.data.message + '</div>');
                        conversationHistory.push({ text: 'Error: ' + response.data.message, isUser: false });
                    }
                    scrollToBottom();
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error); // Debug log
                    messagesContainer.append('<div class="bot-message">Bot: Sorry, something went wrong. Please try again.</div>');
                    conversationHistory.push({ text: 'Sorry, something went wrong.', isUser: false });
                    scrollToBottom();
                }
            });

            $(this).val('');
        }
    });
});