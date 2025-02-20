<?php
/**
 * This is the file for managing extra filter option depends on Category
 */


/**
* #################################################################
*	  Specify room/type capacity w.r.t Category in Admin Panel
* #################################################################
*/

function acf_admin_property_script() {
    ?>
<script type="text/javascript">
(function($) {
    function filterRoomCapacityOptions() {
        var selectedCategories = [];

        $('#taxonomy-property-category input[type="checkbox"]:checked').each(function() {
            selectedCategories.push($(this).parent().text().trim().toLowerCase());
        });

        var predefinedOptions = {
            'residential': ['1 BHK', '2 BHK', '3 BHK', '4 BHK', '5 BHK', '6 BHK', '8 BHK', 'Duplex', 'Triplex',
                'Penthouse', 'Studio'
            ],
            'commercial': ['Office-IT-ITes', 'Mall-Shopping Complex', 'Retail Hi-Street'],
            'warehouse': ['Warehouse', 'Factoryshed'],
            'land': ['Residential Project', 'Commercial', 'Industrial'],
            'bungalow': ['Bungalow'],
            'prelease': ['New']
        };

        var allOptions = [];
        $('.acf-field[data-name="room_capacity"] input[type="checkbox"]').each(function() {
            allOptions.push($(this).val());
        });

        $('.acf-field[data-name="room_capacity"] input[type="checkbox"]').parent().hide();

        var matchedOptions = [];

        selectedCategories.forEach(function(category) {
            if (predefinedOptions[category]) {
                matchedOptions = matchedOptions.concat(predefinedOptions[category]);
            }
        });

        if (matchedOptions.length === 0) {
            matchedOptions = allOptions;
        }

        matchedOptions.forEach(function(option) {
            $('.acf-field[data-name="room_capacity"] input[value="' + option + '"]').parent().show();
        });
    }

    // Run function when property-category changes
    $(document).on('change', '#taxonomy-property-category input[type="checkbox"]', filterRoomCapacityOptions);

    $(document).ready(filterRoomCapacityOptions);
})(jQuery);
</script>
<?php
}
add_action('acf/input/admin_footer', 'acf_admin_property_script');


/**
* #####################################################################
*	  Specify Structure of Data for Category wise filter in frontend
* #####################################################################
*/
    // function pass_category_data() {
    //     $category_data = [
    //         [
    //             'category' => 'residential',
    //             'types' => ['1 BHK', '2 BHK', '3 BHK', '4 BHK', '5 BHK', '6 BHK', '8 BHK', 'Duplex', 'Triplex', 'Penthouse', 'Studio']
    //         ],
    //         [
    //             'category' => 'commercial',
    //             'types' => ['Office-IT-ITes', 'Mall-Shopping Complex', 'Retail Hi-Street']
    //         ],
    //         [
    //             'category' => 'warehouse',
    //             'types' => ['Warehouse', 'Factoryshed']
    //         ],
    //         [
    //             'category' => 'land',
    //             'types' => ['Residential Project', 'Commercial', 'Industrial']
    //         ],
    //         [
    //             'category' => 'bungalow',
    //             'types' => ['Bungalow']
    //         ]
    //     ];

    //     echo "<script>var categoryWiseData = " . json_encode($category_data) . ";</script>";
    // }
    // add_action('wp_head', 'pass_category_data'); 