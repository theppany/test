<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>


        <link href="{{URL::asset('resources/assets/styles/kendo.common.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('resources/assets/styles/kendo.rtl.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('resources/assets/styles/kendo.default.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('resources/assets/styles/kendo.dataviz.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('resources/assets/styles/kendo.dataviz.default.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{URL::asset('resources/assets/styles/main.css')}}" rel="stylesheet" type="text/css">


    </head>
    <body>

    <div id="example">
        <div id="megaStore">
            <div style="text-align: center;"><img width="100" src="{{URL::asset('resources/assets/img/LogoTKGroup.jpg')}}"></div>
            <ul id="menu" style="display: none;">
                <li>
                    Products
                    <ul>
                        <li>
                            Furniture
                            <ul> <!-- moving the UL to the next line will cause an IE7 problem -->
                                <li>Tables & Chairs</li>
                                <li>Sofas</li>
                                <li>Occasional Furniture</li>
                                <li>Children's Furniture</li>
                                <li>Beds</li>
                            </ul>


                        </li>
                        <li>
                            Decor
                            <ul> <!-- moving the UL to the next line will cause an IE7 problem -->
                                <li>Bed Linen</li>
                                <li>Throws</li>
                                <li>Curtains & Blinds</li>
                                <li>Rugs</li>
                                <li>Carpets</li>
                            </ul>
                        </li>
                        <li>
                            Storage
                            <ul> <!-- moving the UL to the next line will cause an IE7 problem -->
                                <li>Wall Shelving</li>
                                <li>Kids Storage</li>
                                <li>Baskets</li>
                                <li>Multimedia Storage</li>
                                <li>Floor Shelving</li>
                                <li>Toilet Roll Holders</li>
                                <li>Storage Jars</li>
                                <li>Drawers</li>
                                <li>Boxes</li>
                            </ul>

                        </li>
                        <li>
                            Lights
                            <ul> <!-- moving the UL to the next line will cause an IE7 problem -->
                                <li>Ceiling</li>
                                <li>Table</li>
                                <li>Floor</li>
                                <li>Shades</li>
                                <li>Wall Lights</li>
                                <li>Spotlights</li>
                                <li>Push Light</li>
                                <li>String Lights</li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    Stores
                    <ul>
                        <li>
                            <div id="template" style="padding: 10px;">
                                <h2>Around the Globe</h2>
                                <ol>
                                    <li>United States</li>
                                    <li>Europe</li>
                                    <li>Canada</li>
                                    <li>Australia</li>
                                </ol>
                                <!--<img src="../content/web/menu/map.png" alt="Stores Around the Globe" /> -->
                                <button class="k-button">See full list</button>
                            </div>
                        </li>
                    </ul>
                </li>
                <li>
                    Blog
                </li>
                <li>
                    Company
                </li>
                <li>
                    Events
                </li>
                <li disabled="disabled">
                    News
                </li>
            </ul>
        </div>