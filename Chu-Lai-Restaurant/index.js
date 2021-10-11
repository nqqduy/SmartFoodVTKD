const register_login = document.getElementById('register_login');
const taikhoan = document.getElementById('taikhoan');
let number;
let userFB;
firebase.auth().onAuthStateChanged(user => {
    if (!user) {
        const html = `<a href="dangky.html" title=""
                                    ><button
                                        type="button"
                                        class="btn btn-danger btn-lg"
                                        id="myBtn1"
                                    >
                                        Đăng Ký
                                    </button></a
                                >
                                <a href="dangnhap.html" title=""
                                    ><button
                                        type="button"
                                        class="btn btn-default btn-lg"
                                        id="myBtn1"
                                    >
                                        Đăng nhập
                                    </button></a
                                >
                                <br /><br />
                                <p
                                    style="color: white; font-size: 20px"
                                    id="user"
                                >
                                    <i
                                        class="fa fa-user"
                                        aria-hidden="true"
                                    ></i>
                                    Xin chào: khách hàng
                                </p>`;
        register_login.insertAdjacentHTML('beforeend', html);
    } else {
        userFB = user;
        const html = `<p
            style="color: white; font-size: 20px"
            id="user"
        >
            <i
                class="fa fa-user"
                aria-hidden="true"
            ></i>
            Xin chào: ${user.email}
        </p>
        <button
        type="button"
        class="btn btn-danger btn-lg"
        id="myBtn1"
        onclick="logout()"
        >
        Đăng xuất
        </button>
        <br /><br />
        `;
        register_login.insertAdjacentHTML('beforeend', html);
        taikhoan.innerHTML = 'Tài khoản';
    }
});
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
logout = () => {
    firebase
        .auth()
        .signOut()
        .then(() => {
            location.replace('index.html');
        });
};
const render = document.getElementById('render');

renderProduct = data => {
    datarender = [];
    for (var i = 0; i < data.length; i++) {
        datarender = datarender.concat(Object.values(data[i]));
    }
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class="col-sm-3 mt-3">
                    <div class="product">
                        <a href="details${i}.htmnl">
                            <img src="${datarender[i].anh}" alt=""/>
                        </a>
                        <div class="text bk">
                            <h3>
                                <a href="details.php" title=""> ${datarender[i].ten} </a>
                            </h3>
                            <p class="gia">Giá : ${datarender[i].gia} VNĐ</p>
                            <button type='button' style="width:45% " class='btn btn-success' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
                             <button type="button" class="btn" style="width:45% ">
                                    <i class="fa fa-info-circle" ></i>
                                        Chi tiết
                                </button>
                            
                        </div>
                    </div>
                </div>`;
            render.insertAdjacentHTML('beforeend', html);
        }
    }
    if (number == 0) {
        const html = `<div class='col-sm-4' id="child" >
                                    <h2 style="color: red">Đã hết sản phẩm</h2>
			                    </div>`;
        render.insertAdjacentHTML('afterbegin', html);
    }
};
renderData = async () => {
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    data = Object.values(snapshot.val());
                    number = 0;
                    for (var i = 0; i < data.length; i++) {
                        renderProduct(Object.values(data[i]));
                    }
                } else {
                    const html = `<div class='col-sm-4' id="child" >
                                    <h2 style="color: red">Đã hết sản phẩm</h2>
			                    </div>`;
                    render.insertAdjacentHTML('afterbegin', html);
                }
            });
    } catch (err) {
        alert(err);
    }
};
renderData();

let soluong = 0;
getSoluong = async (ten, user) => {
    try {
        const renderItem = await firebase
            .database()
            .ref('datsanpham/' + user.uid + '/' + removeVietnameseTones(ten))
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    console.log(snapshot.val());
                    soluong = snapshot.val().soluong;
                } else {
                    soluong = 0;
                }
            });
    } catch (err) {
        alert(err);
    }
};
addCart = async (ten, gia, anh) => {
    try {
        const checkUsser = await firebase.auth().onAuthStateChanged(user => {
            if (!user) {
                alert('Vui lòng đăng nhập');
                location.replace('dangnhap.html');
            }
        });
        await getSoluong(ten, userFB);
        const addItemCart = await firebase
            .database()
            .ref('datsanpham/' + userFB.uid + '/' + removeVietnameseTones(ten))
            .set({
                ten: ten,
                gia: gia,
                soluong: ++soluong,
            })
            .then(data => {
                alert(ten + ' thêm vào giỏ hàng thành công');
            });
    } catch (error) {
        alert(error);
    }
};
