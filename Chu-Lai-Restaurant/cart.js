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
let userFB;
const render = document.getElementById('dataProduct');
const totalItem = document.getElementById('totalItem');
const totalPrice = document.getElementById('totalPrice');

renderProduct = datarender => {
    totalItem.innerHTML = 'Tổng cộng mặt hàng đã đặt: ' + datarender.length;
    let priceTotal = 0;
    for (var i = 0; i < datarender.length; i++) {
        priceTotal += datarender[i].gia * 1 * (datarender[i].soluong * 1);
        const html = `<tr>
                            <td
                                style="text-align: center"
                                style="text-align: center"
                            >
                                <img
                                    src="${datarender[i].anh}"
                                    style="
                                        width: 50px;
                                        height: 50px;
                                        border: groove #000;
                                    "
                                    id="${`img` + i}"
                                />
                            </td>
                            <td style="text-align: center" class="${
                                `ten ten` + i
                            }">
                            ${datarender[i].ten}
                            </td>
                            <td style="text-align: center" id="${`gia` + i}">
                                ${datarender[i].gia}
                            </td>
                            <td style="text-align: center">
                                <input type="number" class="${
                                    `soluong soluong` + i
                                }"" min="0" value="${datarender[i].soluong}"/>
                            </td>
                            <td style="text-align: center">
                                <button
                                    class="btn btn-info"
                                    style="text-align: center"
                                    id="${`update` + i}
                                        "
                                    onclick="update('${
                                        `update` + i
                                    }',  ${i}, '${datarender[i].anh}')">
                                    Cập nhật
                                </button>
                            </td>
                            <td style="text-align: center">
                                <button class="btn btn-success"
                                onclick="delete_('${
                                    `delete` + i
                                }', ${i})">Xóa</button>
                            </td>
                        </tr>`;
        render.insertAdjacentHTML('afterend', html);
    }
    totalPrice.innerHTML = 'Tổng cộng giá đã đặt: ' + priceTotal + ' VND';
};
const renderData = async () => {
    try {
        await firebase.auth().onAuthStateChanged(user => {
            if (!user) {
            } else {
                userFB = user;
                if (userFB) {
                    const renderItem = firebase
                        .database()
                        .ref('datsanpham/' + userFB.uid)
                        .once('value', snapshot => {
                            if (snapshot.exists()) {
                                data = Object.values(snapshot.val());
                                renderProduct(data);
                            } else {
                                alert('Không có sản phẩm nào đã đặt');
                            }
                        });
                }
            }
        });
    } catch (err) {
        alert(err);
    }
};

renderData();

updateData = async (ten, ten_sp, gia, soluong, anh) => {
    const updateItem = await firebase
        .database()
        .ref('datsanpham/' + userFB.uid + '/' + ten)
        .update({
            anh: anh,
            gia: gia,
            soluong: soluong,
            ten: ten_sp,
        })
        .then(data => {
            alert('Cập nhật thành công');
            location.replace('cart.html');
        });
};

update = (data, i, anh) => {
    anh = anh;
    ten_sp = String(
        document.getElementsByClassName(`ten${i}`)[0].innerHTML
    ).trim();
    ten = removeVietnameseTones(
        String(document.getElementsByClassName(`ten${i}`)[0].innerHTML)
    );
    gia = document.getElementById(`gia${i}`).innerHTML;
    soluong = document.getElementsByClassName(`soluong${i}`)[0].value;
    updateData(ten, ten_sp, gia, soluong, anh);
};

deleteItem = async (ten) => {
    const deleted = await firebase
        .database()
        .ref('datsanpham/' + userFB.uid + '/' + ten)
        .remove()
        .then(data => {
            alert('xóa thành công');
            location.replace('cart.html');
        });
};
delete_ = (data, i) => {
    ten = removeVietnameseTones(
        String(document.getElementsByClassName(`ten${i}`)[0].innerHTML)
    );

    deleteItem(ten);
};
