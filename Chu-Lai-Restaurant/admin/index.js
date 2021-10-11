firebase.auth().onAuthStateChanged(user => {
    if (user) {
        if (user.email != 'admin@gmail.com')
            location.replace('../dangnhap.html');
        console.log(user);
        // else location.replace('index.html');
    } else {
        location.replace('../dangnhap.html');
    }
});

logout = () => {
    firebase
        .auth()
        .signOut()
        .then(() => {
            location.replace('../index.html');
        });
};
