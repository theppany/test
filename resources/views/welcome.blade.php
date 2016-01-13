


@include('layout.header');

<style>

    html #bar_code
    {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;

        text-indent: 0;
        width: 12.4em;
        font-size: 2em;
        text-align:center;
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
        <input id="bar_code" class="k-textbox" placeholder="barcode" type="text"/>
       </div>


    </div>

    <div id="example">

       <div id="grid3" style="width: 49%;float:left;"></div>
        <br/>
        <div style="clear:both"></div>
<div id="grid" style="width: 49%;float: left;"></div>

<div id="grid2" style="width: 49%;float:right;"></div>





        <script>


           

            $(document).ready(function () {
                $("#menu").kendoMenu();
                $("#menu").show();
                load_barcode("{{URL::to('ajax/transaction/list')}}?barcode=");
                load_barcode2("{{URL::to('ajax/top_up/list')}}?barcode=");
                load_barcode3("{{URL::to('ajax/member/list')}}?barcode=");

                $("#bar_code").keypress(function(e){
                    if(e.which == 13) {
                        load_barcode("{{URL::to('ajax/transaction/list')}}?barcode="+$(this).val());
                        load_barcode2("{{URL::to('ajax/top_up/list')}}?barcode="+$(this).val());
                        load_barcode3("{{URL::to('ajax/member/list')}}?barcode="+$(this).val());
                    }
                });



            });









            function load_barcode3($read){

                $("#grid3").empty();
                $("#grid3").kendoGrid({
                    dataSource: {
                        type: "json",
                        transport: {
                            read:$read
                        },
                        pageSize: 20
                    },

                    height: 200,
                    filterable:{

                        multi:true
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
                        width:200
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


            function load_barcode2($read){

                $("#grid2").empty();
                $("#grid2").kendoGrid({
                    dataSource: {
                        type: "json",
                        transport: {
                            read:$read
                        },
                        pageSize: 20
                    },

                    height: 550,
                    filterable:{

                       multi:true
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
                        width:200
                    }, {
                        field: "Old_money",
                        title: "Old Money",
                        width: 200
                    }, {
                        field: "SysDate",
                        title: "Datetime",
                        width: 200
                    },{
                        field: "WorkerID",
                        title: "Worker",
                        width: 100
                    }]
                });


            }



            function load_barcode($read){

                $("#grid").empty();
                $("#grid").kendoGrid({
                    dataSource: {
                        type: "json",
                        transport: {
                            read:$read
                        },
                        pageSize: 20
                    },

                    height: 550,
                    filterable:{
                        multi:true
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
                        width:200
                    }, {
                        field: "DatetimeCarIn",
                        title: "Datetime Car In",
                        width: 200
                    }, {
                        field: "CarTypeName",
                        title: "Car Type Name",
                        width: 200
                    }]
                });

            }
        </script>

@include('layout.footer')