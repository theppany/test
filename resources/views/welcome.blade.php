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

        <script type="text/javascript" src="{{ URL::asset('resources/assets/js/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('resources/assets/js/kendo.all.min.js') }}"></script>


        <style>
            html .k-textbox
            {
                -moz-box-sizing: border-box;
                -webkit-box-sizing: border-box;
                box-sizing: border-box;


                padding-left:0.5em;
                text-indent: 0;
                width: 15.4em;
                font-size: 3em
            }
            #megaStore {
                max-width: 600px;
                margin: 30px auto;
                padding-top: 30px;

            }
            #menu h2 {
                font-size: 1em;
                text-transform: uppercase;
                padding: 5px 10px;
            }
            #template img {
                margin: 5px 20px 0 0;
                float: left;
            }
            #template {
                width: 380px;
            }
            #template ol {
                float: left;
                margin: 0 0 0 30px;
                padding: 10px 10px 0 10px;
            }
            #template:after {
                content: ".";
                display: block;
                height: 0;
                clear: both;
                visibility: hidden;
            }
            #template .k-button {
                float: left;
                clear: left;
                margin: 5px 0 5px 12px;
            }
        </style>
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

       <div style="text-align: center">
        <input id="bar_code" class="k-textbox" type="text"/>
       </div>


    </div>

    <div id="example"">
        <div id="grid" style="width: 100%;font-size: 18px;"></div>

        <script>


           

            $(document).ready(function () {
                $("#menu").kendoMenu();
                $("#menu").show();
                load_barcode("");

                $("#bar_code").keypress(function(e){
                    if(e.which == 13) {
                        load_barcode($(this).val());
                    }
                });



            });



            function load_barcode(barcode){

                $("#grid").empty();
                $("#grid").kendoGrid({
                    dataSource: {
                        type: "json",
                        transport: {
                            read: "{{URL::to('ajax/transaction/list')}}?barcode="+barcode
                        },
                        pageSize: 20
                    },

                    height: 550,
                    filterable:{

                        mode:"row"
                    },
                    groupable: false,
                    sortable: true,
                    pageable: {
                        refresh: true,
                        pageSizes: true,
                        buttonCount: 5
                    },
                    columns: [{

                        field: "TransactionID",
                        title: "#",
                        width: 200
                    }, {
                        field: "CardID",
                        title: "Card ID",
                        width:200
                    }, {
                        field: "DatetimeCarIn",
                        title: "Datetime Car In",
                        width: 200
                    }, {
                        field: "CarTypeName",
                        title: "Car Type Name",
                        width: 250
                    }]
                });

            }
        </script>
</div>


    </body>
</html>
