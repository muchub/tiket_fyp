<div class="card-header bg-info">PAYMENT DETAILS</div>
<div class="shadow p-3 mb-5 bg-white rounded-bottom">
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CARD NUMBER</span>
                <input type="text" class="form-control card_num" placeholder="Enter card number" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">EXPIRE DATE</span>
                <input type="text" class="form-control expire_date" placeholder="MM/YY" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">CV CODE</span>
                <input type="text" class="form-control cvc" placeholder="CVC" aria-label="Username" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <button class="btn btn-success mb-3">Confirm Payment</button>
        </div>
        <div class="col-sm-3">
            <button class="btn btn-danger mb-3 cancel">Cancel Payment</button>
        </div>
    </div>
</div>
</div>

<script>
$(".cancel").click(function(){
    $(".page-content").load("pages/book.php")
    console.log("test")
})
</script>
