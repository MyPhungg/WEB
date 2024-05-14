document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("formncc").addEventListener("submit", function(event){
        var inputIdncc = document.getElementsByClassName("Mancc")[0].value;
        var inputSdt = document.getElementsByClassName("Sdt")[0].value;
        
        if (!/^NCC/.test(inputIdncc)) {
            alert("Mã nhà cung cấp phải bắt đầu bằng NCC");
            event.preventDefault();
            return;            
        } 
        var vnf_regex = /((09|03|07|08|05)+([0-9]{8})b)/g;

        if (!vnf_regex.test(inputSdt)) {
            alert('Vui lòng nhập số điện thoại hợp lệ.');
            event.preventDefault();
            return;
        }
    });
});