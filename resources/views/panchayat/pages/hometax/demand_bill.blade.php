<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/admin/assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
     *{
    margin:0;
    padding:0;
    box-sizing: border-box;
}
p,h1,h2,h3,h4,h5,h6,span,img,ul,li,a,body,nav,section,div{
    margin: 0;
    padding: 0;
}
.demand_bill h5{
    font-size:20px;
    font-weight:800;
    letter-spacing:1px;
    text-align:center;
    margin-bottom:20px;
}
.demand_bill span{
    border-bottom:1px dotted;
}
.demand_bill p{
    text-align:center;
    letter-spacing:.8px;
    color:#000;
}
.book_no{
    font-weight:bold;
    text-align:center;
}
.demand_headings{
    display:flex;
    margin-top:20px;
    justify-content: center;
}
.demand_headings h5{
    border:1px solid #000;
    display:inline-block;
    padding:10px;
    font-size:20px;
    font-weight:700;
    border-radius:3px;
    box-shadow:7px 6px 1px 0px #000;
}
.proparty_owner h5{
    margin-bottom:15px;
}
.proparty_owner span{
    border:1px solid #000;
    border-radius:3px;
    padding:3px 10px;
}
.before_demand h5{
    font-weight:700;
}
.signature_gram p{
    border-top:1px dotted;
    font-weight:600;
    display:inline-block;
}
#printButton {
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        @media print {
            body {
                margin: 0; /* Remove margins for print */
                padding: 0; /* Remove padding for print */
            }

            .container {
                max-height: none; /* Remove height limit */
                overflow: visible; /* Allow content to overflow if necessary */
            }

            table {
                width: 100%; /* Full width for printing */
                page-break-inside: avoid; /* Prevent table from breaking inside pages */
            }

            #printButton {
                display: none; /* Hide print button when printing */
            }

            /* Ensure that the rotated headers do not take too much space */
            th.rotate {
                height: 30px; /* Adjust height if necessary */
                font-size: 3px; /* Adjust font size if necessary */
            }
        }
        
</style>
<body>
    <section>
        <div class="container">
            <div class="col-12 pt-3 pb-1">
                <div class="demand_bill">
                    <h5>Gramhpanchayet <span>Purna</span> Taluka <span>Bhiwahali</span> dist <span>Thane</span></h5>
                    <p>पंचायतीस येणे असलेली कर / फी व इतर रकमा याबद्दल ग्रामपंचायत कायदा कलम १२९(१) अन्वये.</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-sm-4">
                    <div class="book_no">
                        <p>Book Number: <span>1</span></p>
                    </div>
                </div>
                <div class="col-sm-4 my-2">
                <div class="book_no bill_no">
                        <p>Bill Number: <span>1</span></p>
                    </div>
                </div>
                <div class="col-sm-4">
                <div class="book_no property_no">
                        <p>Property No: <span>1/9/101</span></p>
                    </div>
                </div>
            </div>
            <div class="demand_headings">
                <h5>मागणी बिल</h5>
            </div>
            <div class="col-12 mt-4">
                <div class="proparty_owner">
                    <h5>Mr/Mrs Harishchandra Dharma Bhasat</h5>
                    <p>Property Sr.No:- <span>6057</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7 mt-3">
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Sr.No</th>
                            <th scope="col">Description of taxes/fees/other dues</th>
                            <th scope="col">मागील बाकी</th>
                            <th scope="col">चालू कर</th>
                            <th scope="col">एकूण कर</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                                <td>घरपट्टी</td>
                                <td>6535.00</td>
                                <td>1109.00</td>
                                <td>7644.00</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                                <td>आरोग्य कर</td>
                                <td>140.00</td>
                                <td>20.00</td>
                                <td>160.00</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>दिवाबत्ती कर</td>
                            <td>140.00</td>
                            <td>20.00</td>
                            <td>160.00</td>
                            
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td>सार्व / पाणीपट्टी</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            
                            </tr>
                            <tr>
                            <th scope="row">5</th>
                            <td> दुकान / हॉटेल</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            </tr>
                            <tr>
                            <th scope="row">6</th>
                            <td>घंटागाडी</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td>५%  सूट/५%  दंड</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            <td>0.00</td>
                            </tr>
                            <tr style="font-weight:bold !important;">
                                <th scope="row">8</th>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr style="font-weight:bold !important;">
                                <th></th>
                                <td>Total / एकूण</td>
                                <td>6815.00</td>
                                <td>1149.00</td>
                                <td>7964.00</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-md-5">
                    <div>
                        <p>
                        आपणास कळविण्यात येते की, बाजूस नमूद केलेप्रमाणे कर, फी किंवा इतर रक्कम आपल्याकडून पंचायतीस देणे आहे. तरी हे बिल आपणास पोहोचले पासून पंधरा दिवसांच्या आत एकूण रक्कम
                        </p>
                        <div class="my-3">
                            <div class="before_demand mb-2  d-flex justify-content-between">
                                <h5>३० सप्टेंबर पूर्वी</h5>
                                <h5>7964<span>.00</span></h5>
                            </div>
                            <div class="before_demand d-flex justify-content-between">
                                <h5>३० सप्टेंबर नंतर</h5>
                                <h5>7964<span>.00</span></h5>
                            </div>
                        </div>
                        <p>
                        पंचायतीकडे भरावी. सदर प्रमाणे रक्कम मुदतीत आपल्याकडून भरली गेली नाही तर ग्रा. पं. कायदा कलम (129) 2 अन्वये आपणावर मागणीचा हुकूम बजावण्यात येईल आणि त्यानंतर ही रक्कम पंचायतीकडे देण्यास आपण पात्र व्हाल.
                        </p>
                    </div>
                </div>
            </div>
        <div>
            <p>
            जर बिल दिनांकानंतर आपण बिलाचा भरणा केला असेल, तर भरणा केलेली रक्कम वजा करून राहिलेली रक्कम भरावी.            </p>
        </div>
        <div class="row mt-3 mb-5">
            <div class="col-md-4 col-sm-5 col-6">
                <div>
                    <h6>Bill date : <span>21/04/2025</span></h6>
                </div>
            </div>
            <div class="col-md-4 col-sm-5 col-6">
                <div>
                    <h6>Year : <span>2024-25</span></h6>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between">
            <div class="signature_gram">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9r9XkdF21t8m-VJo-gU9p9Os4XTmWfcBeaobP6EsERMpvLhz3tU-Ux8YERvzJN6PvI9w&usqp=CAU" alt=""  width="100" height="100">
                <p>ग्रामपंचायत अधिकारी</p>
            </div>
            <div class="signature_gram">
            <img src="https://img.freepik.com/premium-vector/abstract-fake-signature-documents-contracts-isolated-white-background_608189-1150.jpg?semt=ais_items_boosted&w=740" width="100" height="100" alt="">
             <p>सरपंच</p>
            </div>
        </div>
        </div>
        <button id="printButton" onclick="window.print()">Print</button>
    </section>
</body>
</html>