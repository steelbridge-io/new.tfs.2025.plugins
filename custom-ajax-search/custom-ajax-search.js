jQuery(document).ready(function($) {
    $(document).on('keyup', '.custom-search-field', function() {
        var search_term = $(this).val();
        var post_type = $(this).data('post-type');

        // Only trigger the ajax if the search term is at least 3 characters long
        if (search_term.length >= 3) {
            $.ajax({
                url: cas_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'custom_ajax_search',
                    search_term: search_term,
                    post_type: post_type
                },
                success: function(response) {
                    var $results = $(this).siblings('.custom-search-results');
                    $results.empty();

                    if (response.length) {
                        $.each(response, function(index, value) {
                            $results.append('<div class="custom-search-result-item"><a href="' + value.link + '">' + value.title + '</a></div>');
                        });
                    } else {
                        $results.append('<div class="custom-search-result-item">No results found</div>');
                    }
                }.bind(this)
            });
        } else {
            $(this).siblings('.custom-search-results').empty(); // Clear results if less than 3 characters
        }
    });
});