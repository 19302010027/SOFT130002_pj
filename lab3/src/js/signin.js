function loginConfirm(){
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    if(username !== "" && password !== ""){
        window.alert("登陆成功");
    }else if(username === ""){
        window.alert("用户名不能为空");
    }else{
        window.alert("密码不能为空");
    }
}