jQuery(document).ready(function ($) {
    let itemIndex = $('#carousel-items-table tbody tr').length; // Track number of items

    // Add a new carousel item
    $('#fppc-add-item').click(function () {
        if (itemIndex >= 20) {
            alert('You can only add up to 20 items.');
            return;
        }
        const newRow = `
            <tr>
                <td><input type="text" name="fppc_carousel_items[${itemIndex}][image]" value="" class="widefat"></td>
                <td><input type="text" name="fppc_carousel_items[${itemIndex}][title]" value="" class="widefat"></td>
                <td><textarea name="fppc_carousel_items[${itemIndex}][description]" class="widefat"></textarea></td>
                <td><input type="url" name="fppc_carousel_items[${itemIndex}][url]" value="" class="widefat"></td>
                <td><button type="button" class="button fppc-remove-item">Remove</button></td>
            </tr>
        `;
        $('#carousel-items-table tbody').append(newRow);
        itemIndex++;
    });

    // Remove a carousel item
    $(document).on('click', '.fppc-remove-item', function () {
        $(this).closest('tr').remove();
        itemIndex--;
    });
});