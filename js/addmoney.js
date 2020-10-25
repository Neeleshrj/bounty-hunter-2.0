
document.getElementById('rzp-button1').onclick = function(e){
    var totalAmount=document.forms["myForm"]["amount"].value;
    console.log(totalAmount);
    var options = {
        'key': 'rzp_test_20pfcv37A1h5m5',
        'amount': totalAmount * 100,
        'name': 'Bounty Hunter',
        'description': 'Test Payment',
        'currency': 'INR',
        'image': '',
        'handler': function(response) {
            $.ajax({
                url: 'payment.php',
                type: 'post',
                data: {
                    totalAmount: totalAmount,
                },
                success: function() {
                    window.location.href = 'profile.php';
                }
            });

        },

        'theme': {
            'color': '#528FF0'
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.open();
    e.preventDefault();
    rzp1.on('payment.failed', function (response){
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata);
    });
}
// document.getElementById('rzp-button1').onclick = function(e){
//         rzp1.open();
//         e.preventDefault();
// }
