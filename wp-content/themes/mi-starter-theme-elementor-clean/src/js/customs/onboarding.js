
const helloWorldOB = () => {
    alert("Hello World gaes yah");
    // console.log("halo");
};

const checkPassword = () => {
    var inputpass = document.getElementById("password");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    inputpass.onkeyup = function() {

        // console.log(inputpass.value);
        // Validate lowercase letters
        // var lowerCaseLetters = /[a-z]/g;
        // if(inputpass.value.match(lowerCaseLetters)) {  
        //     letter.classList.remove("invalid");
        //     letter.classList.add("valid");
        // } else {
        //     letter.classList.remove("valid");
        //     letter.classList.add("invalid");
        // }
        
        // // Validate capital letters
        // var upperCaseLetters = /[A-Z]/g;
        // if(inputpass.value.match(upperCaseLetters)) {  
        //     capital.classList.remove("invalid");
        //     capital.classList.add("valid");
        // } else {
        //     capital.classList.remove("valid");
        //     capital.classList.add("invalid");
        // }
        // // Validate numbers
        // var numbers = /[0-9]/g;
        // if(inputpass.value.match(numbers)) {  
        //     number.classList.remove("invalid");
        //     number.classList.add("valid");
        // } else {
        //     number.classList.remove("valid");
        //     number.classList.add("invalid");
        // }
        
        // // Validate length
        // if(inputpass.value.length >= 8) {
        //     length.classList.remove("invalid");
        //     length.classList.add("valid");
        // } else {
        //     length.classList.remove("valid");
        //     length.classList.add("invalid");
        // }
    }
}

const setLocalStorage = () => {
    var inputusername = document.getElementById("username");
    var inputpass = document.getElementById("password");
    var btn_submit_local = document.getElementById("btn_submit_local");
    var count;

    btn_submit_local.onclick = function(){           
        
        if (localStorage.getItem('count')== null) {
            count = 1;             
        }else {
            if (localStorage.getItem('Username')== inputusername.value){
                count = localStorage.getItem('count');
                count++;
            }else{
                count = 1; 
            }
            
        }
        console.log(localStorage.getItem('Username'));

        localStorage.setItem('Username', inputusername.value);
        localStorage.setItem('Password', inputpass.value);     
        localStorage.setItem('count', count);
        
        document.getElementById("count").innerHTML = "User " + inputusername.value+ ", Anda Sudah Gagal Login sebanyak "+count+" kali";

    };
    
}

const setDataSession = () => {
    var inputname = document.getElementById("name");
    var inputphone = document.getElementById("phone");
    // var btnaddInterested = document.getElementById("btnaddInterested");
    // console.log("halo1");
    btnaddInterested.onclick = function(){ 
        console.log("halo");        
        sessionStorage.setItem('name', inputname.value);
        sessionStorage.setItem('phone', inputphone.value);
        showDataSession();
    }

    
    
}

const showDataSession = () => {
    let name = sessionStorage.getItem("name");
    let phone = sessionStorage.getItem("phone");
    let html = "<tr><td>"+name+"</td><td>"+phone+"</td><td></td></tr>";
    document.getElementById("datasession").innerHTML = html;
}


const main = () => {
//    helloWorldOB();
//    checkPassword();
//    setLocalStorage();
   setDataSession();
   showDataSession();
};

export default { main };