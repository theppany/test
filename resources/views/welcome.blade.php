





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

