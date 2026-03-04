<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="center-page">
    <div class="form-container">
        <h1>Create Product</h1>

        <form method="post" action="{{ route('product.store') }}">
            @csrf
            @method('post')

            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Enter Product Name" required>
            </div>

            <div class="form-group">
                <label>Quantity</label>
                <input type="text" name="qty" placeholder="Enter Quantity" required>
            </div>

            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" placeholder="Enter Price" required>
            </div>

            <div class="form-group">
                <label>Description</label>
                <input type="text" name="description" placeholder="Optional Description">
            </div>

            <input type="submit" value="Save Product">
        </form>
    </div>
</body>
</html>


<!-- @csrf နဲ့ @method('post')
CSRF Token, မပါရင် request ကို လက်မခံပါဘူး။
Blade Template ထဲမှာ formတစ်ခုရေးတဲ့အခါ secure HTTP request method ကို ထိန်းချုပ်ဖို အသုံးပြုတဲ့
important directives
CSRF = Cross-Site Request Forgery Attack ကိုကာကွယ်ဖို Laravel ကပြုလုပ်ထားတဲ့ Token ပါ।
အသုံးပြုသူ form submit လုပ်တဲ့အခါ ပိုလာသော data ဟာ တကယ် legitimate user ကနေတကယ် submit လုပ်တာပဲဖြစ်တယ်ဆိုတာ Laravel က verify လုပ်ဖို token တစ်ခုပေးထားတာဖြစ်တယ်။
laravel form အတွင်းမှာ @csrf မထည့်ရင် submit လည်းမရပါဘူး။
Token မပါရင် Laravel က 419 Page Expired error ပြတတ်တယ်။ -->
