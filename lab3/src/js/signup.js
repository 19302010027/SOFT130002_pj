function registerConfirm(){
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const passwordConfirm = document.getElementById("passwordConfirm").value;
    const test = /^(?=.*\d)(?=.*[a-zA-Z])[\dA-Za-z]{8,16}$/;

    if(username === "" || password === "" || passwordConfirm === ""){
        if(username === ""){
            window.alert("用户名不能为空");
        }else if(password === ""){
            window.alert("密码不能为空");
        }else{
            window.alert("确认密码不能为空");
        }
    }else if(password !== passwordConfirm){
        window.alert("密码和确认密码不一致");
    }else if(!test.test(password)){
        window.alert("密码必须是8-16位包含数字和字母的字符串");
    }else{
        window.alert("注册成功");
    }
}