'use-strict';

document.getElementById('form').addEventListener('submit', event => {
    event.preventDefault();
});

signup = async () => {
    const email = document.getElementById('email').value;
    const password = document.getElementById('confirm_password1').value;
    const name = document.getElementById('name');
    const res = await firebase
        .auth()
        .createUserWithEmailAndPassword(email, password)
        .catch(error => {
            const errorHTML = document.getElementById('error');
            if (error.message === 'The email address is badly formatted.')
                errorHTML.innerHTML = 'Địa chỉ email bị định dạng sai.';
            else if (
                error.message === 'Password should be at least 6 characters'
            )
                errorHTML.innerHTML = 'Mật khẩu ít nhất 6 ký tự';
            else if (
                error.message ===
                'The email address is already in use by another account.'
            )
                errorHTML.innerHTML = 'Địa chỉ email đã được sử dụng';
            else errorHTML.innerHTML = error.message;
        });
    if (res) {
        console.log(1);
        const user = await firebase
            .database()
            .ref('users/')
            .child(res.user.uid)
            .set({
                email: res.user.email,
                uid: res.user.uid,
                ten: name,
            });

        alert('Đăng ký thành công');
        location.replace('index.html');
    }
};
