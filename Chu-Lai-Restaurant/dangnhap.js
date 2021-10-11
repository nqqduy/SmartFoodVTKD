'use-strict';

document.getElementById('form').addEventListener('submit', event => {
    event.preventDefault();
});

firebase.auth().onAuthStateChanged(user => {
    if (user.email === 'admin@gmail.com') {
        location.replace('admin/index.html');
    } else if (user.email != 'admin@gmail.com') {
        location.replace('index.html');
    }
});

function login() {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const errorHTML = document.getElementById('error');
    firebase
        .auth()
        .signInWithEmailAndPassword(email, password)
        .catch(error => {
            if (
                error.message ===
                'There is no user record corresponding to this identifier. The user may have been deleted.'
            )
                errorHTML.innerHTML =
                    'Người dùng không tồn tại. Người dùng có thể đã bị xóa.';
            else if (error.message === 'The email address is badly formatted.')
                errorHTML.innerHTML = 'Địa chỉ email bị định dạng sai.';
            else
                errorHTML.innerHTML =
                    'Tên đăng nhập hoặc mật khẩu sai. Vui lòng nhập lại';
        });
}
