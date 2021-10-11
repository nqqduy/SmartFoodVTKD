const taikhoan = document.getElementById('taikhoan');
let userFB;
firebase.auth().onAuthStateChanged(user => {
    if (!user) {
    } else {
        taikhoan.innerHTML = 'Tài khoản';
        userFB = user;
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
let number;
const tatca = document.getElementById('tatca');
const banh = document.getElementById('banh');
const mi = document.getElementById('mi');
const nuocuong = document.getElementById('nuocuong');
const com = document.getElementById('com');
const anvat = document.getElementById('anvat');
const render = document.getElementById('render');
renderProduct = data => {
    datarender = [];

    for (var i = 0; i < data.length; i++) {
        datarender = datarender.concat(Object.values(data[i]));
    }
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }

    if (number == 0) {
        const html = `<div class='col-sm-4' id="child" >
                                    <h2 style="color: red">Đã hết sản phẩm</h2>
			                    </div>`;
        render.insertAdjacentHTML('afterbegin', html);
    }
};
const renderData = async () => {
    try {
        var child = document.querySelectorAll('#child');
        for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
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

const renderProductBanh = async datarender => {
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }
    if (number == 0) {
        const html = `<div class='col-sm-4' id="child">
                                    <h2>Đã hết sản phẩm</h2>
			                </div>`;
        render.insertAdjacentHTML('afterbegin', html);
    }
};
const renderBanh = async () => {
    var child = document.querySelectorAll('#child');
    for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/' + 'doan' + '/' + 'banh')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    number = 0;
                    // console.log(Object.values(snapshot.val()));
                    renderProductBanh(Object.values(snapshot.val()));
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
const renderProductMi = async datarender => {
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }
    if (number == 0) {
        const html = `<div class='col-sm-4' id="child" >
                                    <h2 style="color: red">Đã hết sản phẩm</h2>
			                    </div>`;
        render.insertAdjacentHTML('afterbegin', html);
    }
};
const renderMi = async () => {
    var child = document.querySelectorAll('#child');
    for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/' + 'doan' + '/' + 'mi')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    number = 0;
                    // console.log(Object.values(snapshot.val()));
                    renderProductMi(Object.values(snapshot.val()));
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

const renderProductNuocuong = async datarender => {
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }
    if (number == 0) {
        const html = `<div class='col-sm-4' id="child" >
                                    <h2 style="color: red">Đã hết sản phẩm</h2>
			                    </div>`;
        render.insertAdjacentHTML('afterbegin', html);
    }
};
const renderNuocuong = async () => {
    var child = document.querySelectorAll('#child');
    for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/' + 'thucuong' + '/' + 'nuoc')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    number = 0;
                    // console.log(Object.values(snapshot.val()));
                    renderProductNuocuong(Object.values(snapshot.val()));
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

const renderProductCom = async datarender => {
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }
};
const renderCom = async () => {
    var child = document.querySelectorAll('#child');
    for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/' + 'doan' + '/' + 'com')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    // console.log(Object.values(snapshot.val()));
                    renderProductCom(Object.values(snapshot.val()));
                } else {
                    const html = `<div class='col-sm-4' id="child">
                                    <h2>Đã hết sản phẩm</h2>
			                    </div>`;
                    render.insertAdjacentHTML('afterbegin', html);
                }
            });
    } catch (err) {
        alert(err);
    }
};

const renderProductAnvat = async datarender => {
    for (var i = 0; i < datarender.length; i++) {
        if (datarender[i].soluong * 1 > 0) {
            number++;
            const html = `<div class='col-sm-4' id="child">
			<div class='card' style='width: 18rem; height:400px'>
			<img class='card-img-top img-fluid' src='${datarender[i].anh}' alt='Card image cap'style='width:100%; height:179px'>
			<div class='card-body'>
			<h5 class='card-title tieude' style='
			text-align: center;
			padding-top: 5%; font-size: 30px; color:red;padding-left:10px
			'>${datarender[i].ten}</h5>
			<p class='card-text'style='color:blue; font-size: 20px; padding-left:10px'>${datarender[i].mota}</p>
			<p style='font-size: 20px;padding-left:10px'>Giá: ${datarender[i].gia} VNĐ</p>
			<button type='button' class='btn btn-success duy11' onclick="addCart('${datarender[i].ten}', '${datarender[i].gia}','${datarender[i].anh}')"> <i class='fa fa-shopping-cart'> Thêm vào giỏ </i></button>
			</div>
			</div>
			</div>`;
            render.insertAdjacentHTML('afterbegin', html);
        }
    }
};
const renderAnvat = async () => {
    var child = document.querySelectorAll('#child');
    for (var i = 0; i < child.length; i++) render.removeChild(child[i]);
    try {
        const renderItem = await firebase
            .database()
            .ref('sanpham/' + 'doan' + '/' + 'anvat')
            .once('value', snapshot => {
                if (snapshot.exists()) {
                    // console.log(Object.values(snapshot.val()));
                    renderProductAnvat(Object.values(snapshot.val()));
                } else {
                    const html = `<div class='col-sm-4' id="child">
                                    <h2>Đã hết sản phẩm</h2>
			                    </div>`;
                    render.insertAdjacentHTML('afterbegin', html);
                }
            });
    } catch (err) {
        alert(err);
    }
};
//banh;mi;nuocuong;com;anvat;
setupcolor = () => {
    tatca.style.backgroundColor = '#efefef';
    tatca.style.color = 'black';
    banh.style.backgroundColor = '#efefef';
    banh.style.color = 'black';
    mi.style.backgroundColor = '#efefef';
    mi.style.color = 'black';
    nuocuong.style.backgroundColor = '#efefef';
    nuocuong.style.color = 'black';
    com.style.backgroundColor = '#efefef';
    com.style.color = 'black';
    anvat.style.backgroundColor = '#efefef';
    anvat.style.color = 'black';
};
tatca.onclick = () => {
    setupcolor();
    tatca.style.backgroundColor = '#333333';
    tatca.style.color = 'white';
    renderData();
};
banh.onclick = () => {
    setupcolor();
    banh.style.backgroundColor = '#333333';
    banh.style.color = 'white';
    renderBanh();
};
mi.onclick = () => {
    setupcolor();
    mi.style.backgroundColor = '#333333';
    mi.style.color = 'white';
    renderMi();
};
nuocuong.onclick = () => {
    setupcolor();
    nuocuong.style.backgroundColor = '#333333';
    nuocuong.style.color = 'white';
    renderNuocuong();
};
com.onclick = () => {
    setupcolor();
    com.style.backgroundColor = '#333333';
    com.style.color = 'white';
    renderCom();
};
anvat.onclick = () => {
    setupcolor();
    anvat.style.backgroundColor = '#333333';
    anvat.style.color = 'white';
    renderAnvat();
};

renderPage = () => {
    tatca.style.backgroundColor = '#333333';
    tatca.style.color = 'white';
    renderData();
};
renderPage();
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
                anh: anh,
            })
            .then(data => {
                alert(ten + ' thêm vào giỏ hàng thành công');
            });
    } catch (error) {
        alert(error);
    }
};
