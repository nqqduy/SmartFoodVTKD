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
    } else location.replace('../dangnhap.html');
});

logout = () => {
    firebase
        .auth()
        .signOut()
        .then(() => {
            location.replace('../index.html');
        });
};
let listen = 0;
let number;
const render = document.getElementById('dataProduct');
renderProduct = data => {
    datarender = [];
    for (var i = 0; i < data.length; i++) {
        datarender = datarender.concat(Object.values(data[i]));
    }
    for (var i = 0; i < datarender.length; i++) {
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
                                />
                            </td>
                            <td style="text-align: center" class="${
                                `ten ten` + i
                            }">
                            ${datarender[i].ten}
                            </td>
                            <td style="text-align: center">
                                <input type="number" class="${
                                    `gia gia` + i
                                }" value="${datarender[i].gia}"/>
                            </td>
                            <td style="text-align: center" id="${
                                `loainhan` + i
                            }">${datarender[i].loai}-${datarender[i].nhan}</td>
                            <td style="text-align: center">
                                <input type="text" class=" ${
                                    `mota mota` + i
                                }" value="${datarender[i].mota}" />
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
                                    onclick="update('${`update` + i}',  ${i})">
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
        number += 1;
        render.insertAdjacentHTML('afterend', html);
    }
};
const renderData = async () => {
    try {
        number = 0;
        const renderItem = await firebase
            .database()
            .ref('sanpham/')
            .once('value', snapshot => {
                data = Object.values(snapshot.val());

                for (var i = 0; i < data.length; i++) {
                    console.log(Object.values(data[i]));
                    renderProduct(Object.values(data[i]));
                    listen += Object.values(data[i]).length;
                }
            });
    } catch (err) {
        alert(err);
    }
};
renderData();
deleteItem = async (loai, nhan, ten) => {
    const deleted = await firebase
        .database()
        .ref('sanpham/' + loai + '/' + nhan + '/' + ten)
        .remove()
        .then(data => {
            alert('xóa thành công');
            location.replace('food_list.html');
        });
};
delete_ = (data, i) => {
    let loaiNhan = document.getElementById(`loainhan${i}`).innerHTML;
    loaiNhan = loaiNhan.split('-');
    loai = loaiNhan[0];
    nhan = loaiNhan[1];
    ten = removeVietnameseTones(
        String(document.getElementsByClassName(`ten${i}`)[0].innerHTML)
    );

    deleteItem(loai, nhan, ten);
};

updateData = async (loai, nhan, ten, ten_sp, gia, soluong, mota) => {
    const updateItem = await firebase
        .database()
        .ref('sanpham/' + loai + '/' + nhan + '/' + ten)
        .update({
            gia: gia,
            loai: loai,
            mota: mota,
            nhan: nhan,
            soluong: soluong,
            ten: String(ten_sp),
        })
        .then(data => {
            alert('Cập nhật thành công');
            location.replace('food_list.html');
        });
};

update = (data, i) => {
    let loaiNhan = document.getElementById(`loainhan${i}`).innerHTML;
    loaiNhan = loaiNhan.split('-');
    loai = loaiNhan[0];
    nhan = loaiNhan[1];
    ten_sp = String(
        document.getElementsByClassName(`ten${i}`)[0].innerHTML
    ).trim();
    ten = removeVietnameseTones(
        String(document.getElementsByClassName(`ten${i}`)[0].innerHTML)
    );
    gia = document.getElementsByClassName(`gia${i}`)[0].value;
    soluong = document.getElementsByClassName(`soluong${i}`)[0].value;
    mota = document.getElementsByClassName(`mota${i}`)[0].value;

    updateData(loai, nhan, ten, ten_sp, gia, soluong, mota);
};
