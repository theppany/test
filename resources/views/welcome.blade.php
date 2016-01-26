@include('layout.header')

<style>

    html #bar_code {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;

        text-indent: 0;
        width: 12.4em;
        font-size: 2em;
        text-align: center;
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

<script>


    $(document).ready(function () {







        $("#menu").kendoMenu();
        $("#menu").show();
        load_barcode("{{URL::to('ajax/transaction/list')}}?barcode=");
        load_barcode2("{{URL::to('ajax/top_up/list')}}?barcode=");
        load_barcode3("{{URL::to('ajax/member/list')}}?barcode=");
        load_barcode4("{{URL::to('ajax/top_up_online/list')}}?barcode=");

        $("#bar_code").keypress(function (e) {
            if (e.which == 13) {
                load_barcode("{{URL::to('ajax/transaction/list')}}?barcode=" + $(this).val());
                load_barcode2("{{URL::to('ajax/top_up/list')}}?barcode=" + $(this).val());
                load_barcode3("{{URL::to('ajax/member/list')}}?barcode=" + $(this).val());
                load_barcode4("{{URL::to('ajax/top_up_online/list')}}?barcode=" + $(this).val());
            }
        });



        $(".export-pdf").click(function() {
            // Convert the DOM element to a drawing using kendo.drawing.drawDOM
            kendo.drawing.drawDOM($(".content_export"))
                    .then(function(group) {
                        // Render the result as a PDF file
                        return kendo.drawing.exportPDF(group, {
                            paperSize: "auto",
                            margin: { left: "1cm", top: "1cm", right: "1cm", bottom: "1cm" }
                        });
                    })
                    .done(function(data) {
                        // Save the PDF file
                        kendo.saveAs({
                            dataURI: data,
                            fileName: "HR-Dashboard.pdf",
                            proxyURL: ""
                        });
                    });
        });








    });



    function load_barcode4($read) {

        $("#grid4").empty();
        $("#grid4").kendoGrid({
            dataSource: {
                type: "json",
                transport: {
                    read: $read
                },
                pageSize: 20
            },

            height: 200,
            filterable: {

                multi: true
            },
            groupable: false,
            sortable: true,
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            columns: [{

                field: "MemberID",
                title: "Member ID",
                width: 150
            },{

                field: "ReferenceID",
                title: "Bar Code",
                width: 150
            },{
                field: "TopUp_money",
                title: "Amount",
                width: 200
            }, {
                field: "Net_moneyOld",
                title: "Net Money",
                width: 200
            },{
                field: "Old_money",
                title: "Old Money",
                width: 200
            }, {
                field: "SysDate",
                title: "Datetime",
                width: 200
            }, {
                field: "ExternalReferenceID",
                title: "BCEL",
                width: 100
            }]
        });
    }

    function load_barcode3($read) {

        $("#grid3").empty();
        $("#grid3").kendoGrid({
            dataSource: {
                type: "json",
                transport: {
                    read: $read
                },
                pageSize: 20
            },

            height: 200,
            filterable: {

                multi: true
            },
            groupable: false,
            sortable: true,
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            columns: [{

                field: "MemberID",
                title: "Member ID",
                width: 150
            }, {
                field: "Net_money",
                title: "Current Money",
                width: 200
            }, {
                field: "ReferenceID",
                title: "Bar Code",
                width: 200
            }, {
                field: "SysDate",
                title: "Datetime",
                width: 200
            }]
        });


    }


    function load_barcode2($read) {

        $("#grid2").empty();
        $("#grid2").kendoGrid({
            dataSource: {
                type: "json",
                transport: {
                    read: $read
                },
                pageSize: 20
            },

            height: 550,
            filterable: {

                multi: true
            },
            groupable: false,
            sortable: true,
            pageable: {
                refresh: true,
                pageSizes: true,
                buttonCount: 5
            },
            columns: [{

                field: "MemberID",
                title: "Member ID",
                width: 150
            }, {
                field: "Net_money",
                title: "Net Money",
                width: 200
            }, {
                field: "Old_money",
                title: "Old Money",
                width: 200
            }, {
                field: "SysDate",
                title: "Datetime",
                width: 200
            }, {
                field: "WorkerID",
                title: "Worker",
                width: 100
            }]
        });


    }


    function load_barcode($read) {

        $("#grid").empty();
        $("#grid").kendoGrid({
            dataSource: {
                type: "json",
                transport: {
                    read: $read
                },
                pageSize: 20
            },

            height: 550,
            filterable: {
                multi: true
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
                title: "Transaction ID",
                width: 200
            }, {
                field: "CardID",
                title: "Card ID",
                width: 200
            }, {
                field: "DatetimeCarIn",
                title: "Datetime Car In",
                width: 200
            }, {
                field: "CarTypeName",
                title: "Car Type Name",
                width: 200
            }, {
                field: "CarPrice",
                title: "Car Price",
                width: 200
            }]
        });

    }
</script>
<div style="text-align: center">
    <input id="bar_code" class="k-textbox" placeholder="barcode" type="text"/>
</div>

<div class="box-col">
    <button class='export-pdf k-button'>Export as PDF</button>
</div>
</div>

<div id="example" class="content_export">
    <div style="width: 49%;float:left">
        <h2>Member Info</h2>

        <div id="grid3" style=""></div>
    </div>

    <div style="width: 49%;float:right">
        <h2>Top Up Online</h2>

        <div id="grid4" style=""></div>
    </div>


    <div style="clear:both"></div>
    <div style="width: 49%;float: left">
        <h2>Transaction Car</h2>

        <div id="grid" style=""></div>
    </div>
    <div style="width: 49%;float:right;">
        <h2>Top Up</h2>

        <div id="grid2" style=""></div>

    </div>




@include('layout.footer')