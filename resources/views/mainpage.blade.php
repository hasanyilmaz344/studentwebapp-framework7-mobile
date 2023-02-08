<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#2196f3">
    <title> StudentWebApp | framework7 </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7@7.0.8/framework7-bundle.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/framework7-icons@5.0.5/css/framework7-icons.css">
    <style>

    </style>
    <script>
        window.onload = onload();

        function onload() {
            theurl = window.location.href;
            if (theurl.includes('student')) {
                window.location.href = 'http://localhost:8000/';
            }
        }

        function gopage(val) {

            pagetotal = document.getElementById('pagetotal').value;
            pagelast = document.getElementById('pagelast').value;
            pagecurrent = document.getElementById('pagecurrent').value;
            pagego = val;
            theurl = window.location.href;
            if (!(pagecurrent > 0)) {
                pagecurrent = 1;
            }
            //
            if (val == 'previous') {
                pagego = parseInt(pagecurrent) - 1;
            }
            if (val == 'next') {
                pagego = parseInt(pagecurrent) + 1;
            }
            // 
            if (pagego <= pagelast && pagego > 0) {
                if (theurl.includes('page=')) {
                    theurl = theurl.slice(0, theurl.indexOf("page=") - 1)
                    window.location.href = theurl + 'page=' + pagego;
                }
                if (theurl.includes('filter')) {
                    window.location.href = theurl + '&page=' + pagego;
                }
                if (!theurl.includes('filter') & !theurl.includes('page=')) {
                    window.location.href = theurl + '?page=' + pagego;
                }
            }
        }

        function changeorderby(thevalue) {
            document.getElementById("orderby").value = thevalue;

            if (document.getElementById('theascdesc').value == 'ASC') {
                document.getElementById("theascdesc").value = 'DESC';
            } else {
                document.getElementById("theascdesc").value = 'ASC';
            }

            document.getElementById("filterbutton").click();
        }

        function changeupdatesid(id, fname, lname, snumber, department, age) {
            document.getElementById('upid').value = id;
            document.getElementById('upfname').value = fname;
            document.getElementById('uplname').value = lname;
            document.getElementById('upsnumber').value = snumber;
            document.getElementById('updepartment').value = department;
            document.getElementById('upage').value = age;

        }
    </script>
</head>

<body>
    <div id="app">
        <div class="view view-main">
            <!-- /// ana tablo -->
            @include('showstudents')
            <!-- // left side for update student -->
            <div class="panel panel-left panel-resizable">
                <div class="block-title">Only Inputs</div>
                <div class="list no-hairlines-md">
                    <form action="/updatestudent" method="get">
                        <ul>

                            <input type="hidden" id="upid" name="upid" value="nul" placeholder="1" />

                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="upfname" name="upfname" placeholder="First Name" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="uplname" name="uplname" placeholder="Last Name" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="number" id="upsnumber" name="upsnumber" placeholder="Student Number" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="updepartment" name="updepartment" placeholder="Department Name" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>

                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="number" id="upage" name="upage" placeholder="Age" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>

                            <button class="col button button-fill color-blue" type="submit">Update</button>
                        </ul>
                    </form>
                </div>
            </div>
            <!-- // right side for create student -->
            <div class="panel panel-right">
                <div class="block-title">Only Inputs</div>
                <div class="list no-hairlines-md">
                    <form action="/createstudent" method="get">
                        <ul>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="newfname" name="newfname" placeholder="First Name" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="newlname" name="newlname" placeholder="Last Name" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="number" id="newsnumber" name="newsnumber" placeholder="Student Number" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>
                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="text" id="newdepartment" name="newdepartment" placeholder="Department" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>

                            <li class="item-content item-input">
                                <div class="item-inner">
                                    <div class="item-input-wrap">
                                        <input type="number" id="newage" name="newage" placeholder="Age" required="" />
                                        <span class="input-clear-button"></span>
                                    </div>
                                </div>
                            </li>

                            <button class="col button button-fill color-blue" type="submit">Create</button>
                        </ul>
                    </form>
                </div>
            </div>
            <!-- /// -->
        </div>
    </div>


    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/framework7@7.0.8/framework7-bundle.min.js"></script>
    <script>
        var app = new Framework7({
            el: '#app',
            name: 'Student Web App'
        });

        var mainView = app.views.create('.view-main');
    </script>
</body>

</html>