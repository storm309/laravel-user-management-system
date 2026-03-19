<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details - {{ $product['name'] }}</title>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Product Details</h1>
            <span class="badge">ID: {{ $product['id'] }}</span>
        </div>

        <div class="product-details">
            <div class="detail-row">
                <span class="label">Product Name</span>
                <span class="value">{{ $product['name'] }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Price</span>
                <span class="value price">${{ number_format($product['price'], 2) }}</span>
            </div>

            <div class="detail-row">
                <span class="label">Description</span>
                <span class="value">{{ $product['description'] }}</span>
            </div>
        </div>

        <div class="info-box">
            <h3>Cookie Information</h3>
            <p>
                This response includes cookies with:
                <br>• <strong>product_id</strong>: {{ $product['id'] }}
                <br>• <strong>product_name</strong>: {{ $product['name'] }}
                <br>Expires in 60 minutes
            </p>
        </div>

        <div class="info-box cookies-info">
            <h3>Custom Headers</h3>
            <p>
                This response includes custom headers:
                <br>• <strong>X-Product-ID</strong>: {{ $product['id'] }}
                <br>• <strong>X-Product-Name</strong>: {{ $product['name'] }}
            </p>
        </div>

        <div class="buttons">
            <button class="btn-secondary" onclick="history.back()">← Back</button>
            <button class="btn-primary" onclick="location.href='/product-redirect'">Test Redirect Route</button>
        </div>
    </div>
</body>
</html>
