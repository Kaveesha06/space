function changeView() {
    var signInBox = document.getElementById("signInBox");
    var signUpBox = document.getElementById("signUpBox");

    signInBox.classList.toggle("d-none");
    signUpBox.classList.toggle("d-none");
}

function signUp() {
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    //alert (fname.value);

    var f = new FormData();
    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("u", username.value);
    f.append("p", password.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            
            if (response == "Success") {
                document.getElementById("msg1").innerHTML = "Registration Successfully";
                document.getElementById("msg1").className = "alert alert-success";
                document.getElementById("msgDiv1").className = "d-block";

                swal("Welcome to the Lunar Arcade!", "sign Up successfully!", "success");

                fname.value = "";
                lname.value = "";
                email.value = "";
                mobile.value = "";
                username.value = "";
                password.value = "";

            } else {
                // document.getElementById("msg1").innerHTML = response;
                // document.getElementById("msg1").className = "alert alert-warning";
                // document.getElementById("msgDiv1").className = "d-block";
                swal("Retry", "Check your details !!", "warning");
            }
        }
    }

    request.open("POST", "signUpProcess.php", true);
    request.send(f);
}

function signIn() {

    var un = document.getElementById("un");
    var pw = document.getElementById("pw");
    var rm = document.getElementById("rm");

    //alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);
    f.append("r", rm.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Success") {
                window.location = "index.php";
            } else {
                // document.getElementById("msg2").innerHTML = response;
                // document.getElementById("msgDiv2").className = "d-block";
                swal("Retry", "Check your details !!", "warning");
            }
        }
    }

    request.open("POST", "signInProcess.php", true);
    request.send(f);

}

let usernameRef = document.getElementById("username");
let passwordRef = document.getElementById("password");
let eyeL = document.querySelector(".eyeball-l");
let eyeR = document.querySelector(".eyeball-r");
let handL = document.querySelector(".hand-l");
let handR = document.querySelector(".hand-r");

let normalEyeStyle = () => {
  eyeL.style.cssText = `
    left:0.6em;
    top: 0.6em;
  `;
  eyeR.style.cssText = `
  right:0.6em;
  top:0.6em;
  `;
};

let normalHandStyle = () => {
  handL.style.cssText = `
        height: 2.81em;
        top:8.4em;
        left:7.5em;
        transform: rotate(0deg);
    `;
  handR.style.cssText = `
        height: 2.81em;
        top: 8.4em;
        right: 7.5em;
        transform: rotate(0deg)
    `;
};
//When clicked on username input
usernameRef.addEventListener("focus", () => {
  eyeL.style.cssText = `
    left: 0.75em;
    top: 1.12em;  
  `;
  eyeR.style.cssText = `
    right: 0.75em;
    top: 1.12em;
  `;
  normalHandStyle();
});
//When clicked on password input
passwordRef.addEventListener("focus", () => {
  handL.style.cssText = `
        height: 6.56em;
        top: 3.87em;
        left: 11.75em;
        transform: rotate(-155deg);    
    `;
  handR.style.cssText = `
    height: 6.56em;
    top: 3.87em;
    right: 11.75em;
    transform: rotate(155deg);
  `;
  normalEyeStyle();
});
//When clicked outside username and password input
document.addEventListener("click", (e) => {
  let clickedElem = e.target;
  if (clickedElem != usernameRef && clickedElem != passwordRef) {
    normalEyeStyle();
    normalHandStyle();
  }
});


function adminSignIn() {
    // alert("OK");
    var un = document.getElementById("username");
    var pw = document.getElementById("password");

    //  alert(un.value);

    var f = new FormData();
    f.append("u", un.value);
    f.append("p", pw.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "adminDashboard.php";
                
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
                // swal("Retry", "Check your details !!", "warning");
            }
        }
    };

    request.open("POST", "adminSignInProcess.php", true);
    request.send(f);
}

function loadUser() {
    // alert("OK")
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("tb").innerHTML = response;
        }
    };

    request.open("POST", "loadUserProcess.php", true);
    request.send();
}

function updateUserStatus() {
    // alert("OK");
    var userid = document.getElementById("uid");
    //  alert(userid.value);

    var f = new FormData();
    f.append("u", userid.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "Deactive") {
                document.getElementById("msg").innerHTML = "User Deactivate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();

            } else if (response == "Active") {
                document.getElementById("msg").innerHTML = "User Activate Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                userid.value = "";
                loadUser();


            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";

            }
        }
    };

    request.open("POST", "updateUserStatusProcess.php", true);
    request.send(f);

}

function reload() {
    location.reload();
}

function categoryReg() {
    var cat = document.getElementById("cat");
    // alert(cat.value);

    var f = new FormData();
    f.append("c", cat.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response == "success") {
                document.getElementById("msg").innerHTML = "Category Regsitration Successfully";
                document.getElementById("msg").className = "alert alert-success";
                document.getElementById("msgDiv").className = "d-block";
                cat.value = "";
                location.reload();
            
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
                cat.value = "";
               
            }

        }
    };

    request.open("POST", "categoryRegisterProcess.php", true);
    request.send(f);
}

function franchiseReg() {
    var fran = document.getElementById("fran");

    var f = new FormData();
    f.append("fran", fran.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if ((request.readyState == 4) & (request.status == 200)) {
            var response = request.responseText;
            // alert (response);

            if (response == "success") {
                document.getElementById("msg2").innerHTML = "Franchise Regsitration Successfully";
                document.getElementById("msg2").className = "alert alert-success";
                document.getElementById("msgDiv2").className = "d-block";
                fran.value = "";
                location.reload();
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
                fran.value = "";
            }
        }
    };

    request.open("POST", "franchiseRegisterProcess.php", true);
    request.send(f);
}

function regProduct() {
    // alert("Success");
    var pname = document.getElementById("pname");
    var cat = document.getElementById("cat");
    var fran = document.getElementById("fran");
    var desc = document.getElementById("desc");
    var file = document.getElementById("file");
    // alert(pname.value);

    var f = new FormData();
    f.append("pn", pname.value);
    f.append("cat", cat.value);
    f.append("fran", fran.value);
    f.append("desc", desc.value);
    f.append("img", file.files[0]);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {

            var response = request.responseText;

            if (response == "Success") {

                // document.getElementById("msg").innerHTML = "Registration Successfully";
                // document.getElementById("msg").className = "alert alert-success";
                // document.getElementById("msgDiv").className = "d-block";

                //alert("Product Uploaded Successfull");
                location.reload();
            } else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
                document.getElementById("msg").className = "alert alert-warning";

            }
        }
    };
    request.open("POST", "productRegprocess.php", true);
    request.send(f);
}

function printDiv() {

    var orginalContent = document.body.innerHTML;
    var printArea = document.getElementById("printArea").innerHTML;

    document.body.innerHTML = printArea;
    window.print();

    document.body.innerHTML = orginalContent;
}

function updateStock() {
    // alert("OK");
    var pname = document.getElementById("sproduct");
    var qty = document.getElementById("qty");
    var price = document.getElementById("uprice");

    //alert(pname.value);

    var f = new FormData();
    f.append("p", pname.value);
    f.append("q", qty.value);
    f.append("up", price.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;

            if (response == "Success") {
                //alert("Product Uploaded Successfull");
                location.reload();
            } else {
                document.getElementById("msg2").innerHTML = response;
                document.getElementById("msgDiv2").className = "d-block";
                document.getElementById("msg2").className = "alert alert-warning";
            }
        }
    }

    request.open("POST", "updateStockProcess.php", true);
    request.send(f);

}


function loadProduct(x) {
    var page = x;
    // alert(x);

    var f = new FormData();
    f.append("p", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "loadProductProcess.php", true);
    request.send(f);
}

function searchProduct(x) {

    var page = x;
    var product = document.getElementById("product");

    // alert(page);
    // alert(product);

    var f = new FormData();
    f.append("p", product.value);
    f.append("pg", page);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert(response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "searchProductProcess.php", true);
    request.send(f);
}

function viewFilter() {
    // alert("OK");
    document.getElementById("filterId").className = "d-block";
}

function advSearchProduct(x) {

    var page = x;
    var cat = document.getElementById("cat");
    var fran = document.getElementById("fran");
    var min = document.getElementById("min");
    var max = document.getElementById("max");

    var f = new FormData();
    f.append("pg", page);
    f.append("cat", cat.value);
    f.append("fran", fran.value);
    f.append("min", min.value);
    f.append("max", max.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert (response);
            document.getElementById("pid").innerHTML = response;
        }
    };

    request.open("POST", "advSearchProductProcess.php", true);
    request.send(f);
}

function uploadImg() {
    //alert("OK");
    var img = document.getElementById("imgUploader");

    var f = new FormData();
    f.append("i", img.files[0]);


    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            alert(response);
            if (response == "empty") {
                //alert("Please Select Your Profile Image");
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msgDiv").className = "d-block";
                swal("Retry", "Please Select Your Profile Image!!", "warning");
            } else {
                document.getElementById("i").src = response;
                //img.value = "";
                reload();
            }
        }
    };

    request.open("POST", "profileImgUploadProcess.php", true);
    request.send(f);
}

function updateData() {
    //alert("OK");
    var fname = document.getElementById("fname");
    var lname = document.getElementById("lname");
    var email = document.getElementById("email");
    var mobile = document.getElementById("mobile");
    var pw = document.getElementById("pw");
    var no = document.getElementById("no");
    var line1 = document.getElementById("line1");
    var line2 = document.getElementById("line2");

    // alert(line1.value);
    // alert(line2.value);
    // alert(no.value);
    // alert(pw.value);
    // alert(mobile.value);
    // alert(email.value);
    // alert(lname.value);
    // alert(fname.value);

    var f = new FormData();

    f.append("f", fname.value);
    f.append("l", lname.value);
    f.append("e", email.value);
    f.append("m", mobile.value);
    f.append("p", pw.value);
    f.append("n", no.value);
    f.append("l1", line1.value);
    f.append("l2", line2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);

            document.getElementById("msg").innerHTML = response;
            document.getElementById("msgDiv").className = "d-block";
            
        }
    };

    request.open("POST", "updateDataProcess.php", true);
    request.send(f);
}


function signOut() {
    // alert("OK");
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            alert(response);
            reload();
        }
    };

    request.open("POST", "signOutProcess.php", true);
    request.send();

}

function addtoCart(x) {
    
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                alert(response);
                qty.value = "";
            }
        };

        request.open("POST", "addtoCartProcess.php", true);
        request.send(f);
    } else {
        alert("Please Enter Your Quantity");
    }
}

function loadCart() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("cartBody").innerHTML = response;
        }
    };

    request.open("POST", "loadCartProcess.php", true);
    request.send();
}

function incrementCartQty(x){

    var cartId = x;
    var qty = document.getElementById("qty" + x);
    //alert(qty.value);
    var newQty = parseInt(qty.value) + 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function(){
        if(request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            if (response=="Success") {
                qty.value = parseInt(qty.value) +1;
                loadCart();
            }else {
                alert(response);
            }
        }
    };

    request.open("POST", "updateCartQtyProcess.php", true);
    request.send(f);
}

function decrementCartQty(x){
    var cartId = x;
    var qty = document.getElementById("qty" + x);
    var newQty = parseInt(qty.value) - 1;
    //alert(newQty);

    var f = new FormData();
    f.append("c", cartId);
    f.append("q", newQty);

    if (newQty>0) {
        var request = new XMLHttpRequest();
        request.onreadystatechange = function(){
            if(request.readyState==4 && request.status==200) {
                var response = request.responseText;
                //alert(response);
                if (response=="Success") {
                    qty.value = parseInt(qty.value) -1;
                    loadCart();
                }else {
                    alert(response);
                }
            }
        };
    
        request.open("POST", "updateCartQtyProcess.php", true);
        request.send(f);
    }
}

function removeCart(x){

    // if(confirm("Are you sure deleting this item?")) {
        var f = new FormData();
        f.append("c",x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if (request.readyState ==4 & request.status==200){
                var response = request.responseText;
                // alert(response);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                    } else {
                      swal("Your imaginary file is safe!");
                    }
                });
                
            }
        };
        
        request.open("POST", "removeCartProcess.php", true);
        request.send(f);
   // }
}

function addtoWishlist(x) {
    var stockId = x;
    var qty = document.getElementById("qty");

    if (qty.value > 0) {

        var f = new FormData();
        f.append("s", stockId);
        f.append("q", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                alert(response);
                qty.value = "";
            }
        };

        request.open("POST", "addtoWishlistProcess.php", true);
        request.send(f);
    } else {
        alert("Please Enter Your Quantity");
    }
}

function loadWishlist() {
    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            //alert(response);
            document.getElementById("wishlistBody").innerHTML = response;
        }
    };

    request.open("POST", "loadWishlistProcess.php", true);
    request.send();
}

function removeWishlist(x) {
    // if(confirm("Are you sure deleting this item?")) {
        var f = new FormData();
        f.append("w",x);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if (request.readyState ==4 & request.status==200){
                var response = request.responseText;
                // alert(response);
                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                  .then((willDelete) => {
                    if (willDelete) {
                      swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                      });
                    } else {
                      swal("Your imaginary file is safe!");
                    }
                });
                
            }
        };
        
        request.open("POST", "removeWishlistProcess.php", true);
        request.send(f);
   // }
}

function checkOut() {
    //alert("OK");
    var f = new FormData();
    f.append("cart", true);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function() {
        if(request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            //alert(response);
            var payment = JSON.parse(response);
            doCheckout(payment, "checkoutProcess.php");
        }
    };

    request.open("POST", "paymentProcess.php", true);
    request.send(f);
}

function doCheckout(payment, path) {
    // Payment completed. It can be a successful failure.
    payhere.onCompleted = function onCompleted(orderId) {
        console.log("Payment completed. OrderID:" + orderId);
        // Note: validate the payment and show success or failure page to the customer

        var f = new FormData();
        f.append("payment", JSON.stringify(payment));

        var request = new XMLHttpRequest();
        request.onreadystatechange = function (){
            if (request.readyState==4 & request.status==200) {
                var response = request.responseText;
                // alert(response);
                if(response == "Success") {
                    reload();
                }else {
                    alert(response);
                }
            }
        };

        request.open("POST", path, true);
        request.send(f);
    };

    // Payment window closed
    payhere.onDismissed = function onDismissed() {
        // Note: Prompt user to pay again or show an error page
        console.log("Payment dismissed");
    };

    // Error occurred
    payhere.onError = function onError(error) {
        // Note: show an error page
        console.log("Error:"  + error);
    };


    // Show the payhere.js popup, when "PayHere Pay" is clicked
    //document.getElementById('payhere-payment').onclick = function (e) {
        payhere.startPayment(payment);
    
}

function buyNow(stockId) {
    //alert (stockId);
    var qty = document.getElementById("qty");

    if (qty.value >0) {
        //alert("OK");
        var f = new FormData();
        f.append("cart", false);
        f.append("stockId", stockId);
        f.append("qty", qty.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if(request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                //alert(response);
                var payment = JSON.parse(response);
                payment.sid = Id;
                payment.qty = qty.value;
                doCheckout(payment, "buynowProcess.php");
            }
        };

        request.open("POST", "paymentProcess.php", true);
        request.send(f);
    }else{
        alert("Please enter valid quantity");
    }
}

function forgetPassword() {
    // alert("OK");
    var email = document.getElementById("e");

    if (email.value != "") {

        var f = new FormData();
        f.append("e", email.value);

        var request = new XMLHttpRequest();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                var response = request.responseText;
                //alert(response);
                if (response == "Success") {
                    document.getElementById("msg").innerHTML = "Email sent! Please check Your mail box";
                    document.getElementById("msg").className = "alert alert-success";
                    email.value = "";
                }else{
                    document.getElementById("msg").innerHTML = response;
                    document.getElementById("msg").className = "alert alert-danger";
                    document.getElementById("msgDiv").className = "d-block";
                }
            }
        };

        request.open("POST", "forgetPasswordProcess.php", true);
        request.send(f);
    } else {
        alert("Please enter your valid email");
    }
}

function resetPassword() {
    // alert("OK");
    var vcode = document.getElementById("vcode");
    var np = document.getElementById("np");
    var np2 = document.getElementById("np2");

    var f = new FormData();
    f.append("vcode", vcode.value);
    f.append("np", np.value);
    f.append("np2", np2.value);

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 & request.status == 200) {
            var response = request.responseText;
            // alert(response);
            if (response == "Success") {
                window.location = "signIn.php";
            }else {
                document.getElementById("msg").innerHTML = response;
                document.getElementById("msg").className = "alert alert-danger";
                document.getElementById("msgDiv").className = "d-block";
                
            }
        }
    };

    request.open("POST", "resetPasswordProcess.php", true);
    request.send(f);
}

function loadChart() {
    // alert("OK");
    var ctx = document.getElementById('myChart');

    var request = new XMLHttpRequest();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var response = request.responseText;
            // alert (response);
            var data = JSON.parse(response);

            new Chart(ctx, {
                type: 'doughnut',
                data: {
                  labels: data.labels,
                  datasets: [{
                    label: '# of Votes',
                    data: data.data,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });

        }
    };

    request.open("POST", "loadChartProcess.php", true);
    request.send();
}
