<main class="my-5">
    <div class="container">
        <a href="index.php?page=category" class="btn btn-primary">Quay Lại</a>
        <h3 class="text-center">Thêm Danh Mục Mới</h3>
        <form action="index.php?page=add-category" method="post" onsubmit="return check()">
            <div class="form-group mb-3">
                <label for="name">Tên Danh Mục</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tên Danh Mục....">
            </div>

            <div class="form-group mb-3">
                <label for="home">Home</label>
                <input type="number" name="home" id="home" placeholder="home..." class="form-control">
            </div>


            <button type="submit" class="btn btn-primary" name="themmoi" value=" Thêm Mới ">Thêm Danh Mục</button>
        </form>
    </div>
</main>
<script>
function check() {
    var name = document.getElementById("name");
    var home = document.getElementById("home");
    var hienthi = document.getElementById("hienthi");

    // Create an array of input fields and their corresponding labels
    var fields = [{
            input: name,
            label: "Tên danh mục"
        },
        {
            input: home,
            label: "Home"
        },
        {
            input: hienthi,
            label: "Thứ tự hiển thị"
        }
    ];

    // Check if any field is empty and if "Thứ tự ưu tiên" and "Thứ tự hiển thị" are valid numbers
    for (var i = 0; i < fields.length; i++) {
        var field = fields[i].input;
        if (field.value.trim() === "") {
            alert(fields[i].label + " không được để trống!");
            field.focus();
            return false;
        }
        if (fields[i].label.includes("ưu tiên") || fields[i].label.includes("hiển thị")) {
            if (isNaN(field.value)) {
                alert(fields[i].label + " phải là một con số!");
                field.focus();
                return false;
            }
        }
    }

    return true;
}
</script>