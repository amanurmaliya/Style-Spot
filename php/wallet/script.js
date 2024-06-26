let addmoney = document.getElementById("addmoney");


console.log(1);
console.log(1);

addmoney.addEventListener("click", (e) => {
    let oldAmount = document.getElementsByClassName("amount")[0].innerText;
    $('#addMoneyModal').modal('show')
})