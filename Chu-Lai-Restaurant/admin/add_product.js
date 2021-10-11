document.getElementById('form').addEventListener('submit', event => {
    event.preventDefault();
});
let ImgUrl;
let files = [];
let reader;

function removeVietnameseTones(str) {
    str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, 'a');
    str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, 'e');
    str = str.replace(/ì|í|ị|ỉ|ĩ/g, 'i');
    str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, 'o');
    str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, 'u');
    str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, 'y');
    str = str.replace(/đ/g, 'd');
    str = str.replace(/À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ/g, 'A');
    str = str.replace(/È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ/g, 'E');
    str = str.replace(/Ì|Í|Ị|Ỉ|Ĩ/g, 'I');
    str = str.replace(/Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ/g, 'O');
    str = str.replace(/Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ/g, 'U');
    str = str.replace(/Ỳ|Ý|Ỵ|Ỷ|Ỹ/g, 'Y');
    str = str.replace(/Đ/g, 'D');
    // Some system encode vietnamese combining accent as individual utf-8 characters
    // Một vài bộ encode coi các dấu mũ, dấu chữ như một kí tự riêng biệt nên thêm hai dòng này
    str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ''); // ̀ ́ ̃ ̉ ̣  huyền, sắc, ngã, hỏi, nặng
    str = str.replace(/\u02C6|\u0306|\u031B/g, ''); // ˆ ̆ ̛  Â, Ê, Ă, Ơ, Ư
    // Remove extra spaces
    // Bỏ các khoảng trắng liền nhau
    str = str.replace(/ + /g, ' ');
    str = str.trim();
    // Remove punctuations
    // Bỏ dấu câu, kí tự đặc biệt
    str = str.replace(
        /!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g,
        ' '
    );
    return str.toLowerCase().replace(/ /g, '');
}

firebase.auth().onAuthStateChanged(user => {
    if (user) {
        if (user.email != 'admin@gmail.com')
            location.replace('../dangnhap.html');
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

let product_title,
    product_title_FB,
    product_desc,
    product_price,
    product_cat,
    product_brand;
ready = () => {
    product_title = document.getElementById('product_title').value;
    product_title_FB = document.getElementById('product_title').value;
    product_desc = document.getElementById('product_desc').value;
    product_price = document.getElementById('product_price').value;
    product_cat = document.getElementById('product_cat').value; // min 1 max 2
    product_brand = document.getElementById('product_brand').value; // min 1 max 5
    picture = document.getElementById('picture').value;
};
checkFoodAndDrink = (product_cat, product_brand) => {
    if (
        product_cat == 'doan' &&
        (product_brand == 'mi' ||
            product_brand == 'banh' ||
            product_brand == 'com' ||
            product_brand == 'anvat')
    )
        return true;
    else if (product_cat == 'thucuong' && product_brand == 'nuoc') return true;
    return false;
};
getLinkImg = async ten => {
    try {
        const q = await firebase
            .storage()
            .ref('Images/' + ten)
            .getDownloadURL()
            .then(url => {
                ImgUrl = url;
                const getURRL = firebase
                    .database()
                    .ref(
                        'sanpham/' +
                            product_cat +
                            '/' +
                            product_brand +
                            '/' +
                            ten
                    )
                    .update({
                        ten: String(product_title_FB),
                        mota: product_desc,
                        gia: product_price,
                        loai: product_cat,
                        nhan: product_brand,
                        soluong: 1,
                        anh: ImgUrl,
                    });
            });
    } catch (error) {
        alert(error);
    }
};
uploadImg = async ten => {
    try {
        const upload = await firebase
            .storage()
            .ref('Images/' + ten)
            .put(files[0]);

        getLinkImg(ten);
    } catch (error) {
        alert(error);
    }
};
addItem = async () => {
    try {
        const add = await firebase
            .database()
            .ref(
                'sanpham/' +
                    product_cat +
                    '/' +
                    product_brand +
                    '/' +
                    removeVietnameseTones(product_title)
            )
            .set({
                ten: product_title_FB,
                mota: product_desc,
                gia: product_price,
                loai: product_cat,
                nhan: product_brand,
                soluong: 1,
            })
            .then(data => {
                document.getElementById('error').innerHTML = '';
                document.getElementById(
                    'success'
                ).innerHTML = `${product_title} đã được thêm thành công`;
            });
    } catch (error) {
        alert(error);
    }
};

checkProductAndAdd = async () => {
    titleFromAdmin = removeVietnameseTones(product_title);
    titleFromFirebase = [];
    try {
        const checkData = await firebase
            .database()
            .ref('sanpham/' + product_cat + '/' + product_brand)
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    dataTitle = Object.values(snapshot.val());
                    for (var x = 0; x < dataTitle.length; x++)
                        titleFromFirebase = titleFromFirebase.concat([
                            removeVietnameseTones(String(dataTitle[x].ten)),
                        ]);
                }
                if (
                    !titleFromFirebase.includes(titleFromAdmin) &&
                    product_title != ''
                ) {
                    uploadImg(removeVietnameseTones(product_title));
                    addItem();
                } else if (product_title == '') {
                    document.getElementById('success').innerHTML = '';
                    document.getElementById(
                        'error'
                    ).innerHTML = `Chưa nhập đủ thông tin`;
                } else {
                    document.getElementById('success').innerHTML = '';
                    document.getElementById(
                        'error'
                    ).innerHTML = `${product_title} đã có trong hệ thống, vui lòng thêm sản phẩm khác`;
                }
            });
    } catch (errr) {
        alert(err);
    }
};
document.getElementById('submit').onclick = () => {
    ready();
    let check = checkFoodAndDrink(product_cat, product_brand);
    let titleFromFirebase = '';
    if (check) {
        checkProductAndAdd();
    } else {
        if (product_title != '') {
            document.getElementById('success').innerHTML = '';
            document.getElementById(
                'error'
            ).innerHTML = `Phân loại sản phẩm và nhãn sản phẩm không tương thích`;
        }
    }
};

document.getElementById('picture').onchange = e => {
    files = e.target.files;
    reader = new FileReader();
    reader.readAsDataURL(files[0]);
};
