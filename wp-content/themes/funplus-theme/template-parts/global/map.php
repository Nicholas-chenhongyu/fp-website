<?php

/**
 * Map
 * Map to be displayed before the footer if it's toggled on.
 */

$coords = get_field('main_office', 'option');
$marker = get_field('map_marker', 'option'); ?>

<div class="footer-map">
    <div class="footer-map__map" id="footerMap"></div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo get_field('google_maps', 'option'); ?>"></script>
<script type="text/javascript">
    jQuery(document).ready(() => {
        google.maps.event.addDomListener(window, 'load', initThisMap);

        function initThisMap() {
            var mapOptions = {
                zoom: 14,
                disableDefaultUI: true,
                center: new google.maps.LatLng('<?php echo $coords['lat']; ?>', '<?php echo $coords['long']; ?>'),
                styles: [{
                        "featureType": "administrative",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": "-100"
                        }]
                    },
                    {
                        "featureType": "administrative.province",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": 65
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": "50"
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                            "saturation": "-100"
                        }]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "all",
                        "stylers": [{
                            "lightness": "30"
                        }]
                    },
                    {
                        "featureType": "road.local",
                        "elementType": "all",
                        "stylers": [{
                            "lightness": "40"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "visibility": "simplified"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry",
                        "stylers": [{
                                "hue": "#ffff00"
                            },
                            {
                                "lightness": -25
                            },
                            {
                                "saturation": -97
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "labels",
                        "stylers": [{
                                "lightness": -25
                            },
                            {
                                "saturation": -100
                            }
                        ]
                    }
                ]
            };

            var mapElement = document.getElementById('footerMap');
            var map = new google.maps.Map(mapElement, mapOptions);

            var marker = new google.maps.Marker({
                url: '<?php echo wp_get_attachment_url($marker); ?>',
                position: new google.maps.LatLng('<?php echo $coords['lat']; ?>', '<?php echo $coords['long']; ?>'),
                map: map,
                icon: '<?php echo wp_get_attachment_url($marker); ?>'
            });
        }
    });
</script>