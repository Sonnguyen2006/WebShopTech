$(document).ready(function() {
    //khi ghi vào label id search-input bắt đầu 
    $('#search-input').on('keyup', function() {// on là thao tác trên keyup
        let query = $(this).val();
        //nếu đoạn truy vấn trên label id search-input >0 
        if(query.length > 0){
            //gửi request lên sever
            $.ajax({
                url: window.searchUrl,// là route ('suggest-search') đã tạo trước đó
                type: "GET",//transaction 
                data: { query: query },//tham số    
                success: function(data) {// khi nhận được data từ func suggest trong controller thi tiếp tục
                    let suggestions = '';
                    //show các data vừa nhận được thông qua foreach
                    data.forEach(function(item) {
                        //giá sau khi giảm kiểu dữ liệu số lấy từ lớp Intl
                        let finalPrice = new Intl.NumberFormat('vi-VN').format(item.final_price);
                        //giá gốc xem discount > 0 ? 
                        let originalPrice = item.discount > 0 
                            ? new Intl.NumberFormat('vi-VN').format(item.product_cost)
                            : '';

                        // Tạo link sản phẩm từ Blade → JS (để dùng trong search thường)
                        let productLink = window.productUrl.replace('PRODUCT_ID', item.product_id);

                        // Tạo link ảnh 
                        let imgLink = `${window.imagesUrl}/${item.product_image}`;
                        //hiển thị trực quan cho người dùng
                        suggestions += `
                        <a href="${productLink}" 
                            class="list-group-item list-group-item-action d-flex align-items-center">

                            <img src="${imgLink}" style="width:50px;height:50px;object-fit:cover;margin-right:10px;">

                            <div>
                                <div style="color:black;">${item.product_name}</div>

                                <div class="text-danger fw-bold" style="font-size:0.9rem;">
                                    ${finalPrice}₫
                                    ${originalPrice ? `<span class="text-muted text-decoration-line-through ms-1">${originalPrice}₫</span>` : ''}
                                </div>
                            </div>
                        </a>`;
                    });
                    //hiện lên nếu có trong data
                    $('#suggestions-box').html(suggestions).show();
                }
            });
            //ẩn nếu đã không còn đúng với suggest
        } else {
            $('#suggestions-box').hide();
        }
    });

    // click ra ngoài ẩn suggestion
    $(document).click(function(e) {
        //nếu target không còn nằm trên search-input nữa thì ẩn suggest đi
        if (!$(e.target).closest('#search-input, #suggestions-box').length) {
            $('#suggestions-box').hide();
        }
    });

});
