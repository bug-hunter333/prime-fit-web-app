<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yoga Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; background: #f7f7f7; }
        .container { max-width: 600px; margin: 0 auto; background: white; }
        .header { background: linear-gradient(135deg, #10b981, #059669); color: white; padding: 30px 20px; text-align: center; }
        .content { padding: 30px 20px; }
        .order-item { border-bottom: 1px solid #e5e7eb; padding: 15px 0; display: flex; justify-content: space-between; align-items: center; }
        .order-item:last-child { border-bottom: none; }
        .product-info { flex: 1; }
        .product-name { font-weight: bold; color: #1f2937; margin-bottom: 5px; }
        .product-details { color: #6b7280; font-size: 14px; }
        .price { font-weight: bold; color: #059669; }
        .total-section { background: #f9fafb; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .total-row { display: flex; justify-content: space-between; margin-bottom: 10px; }
        .total-final { font-size: 18px; font-weight: bold; color: #059669; border-top: 2px solid #10b981; padding-top: 10px; }
        .footer { background: #f3f4f6; padding: 20px; text-align: center; color: #6b7280; }
        .yoga-icon { font-size: 24px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="yoga-icon">🧘‍♀️</div>
            <h1 style="margin: 0; font-size: 28px;">Order Confirmation</h1>
            <p style="margin: 10px 0 0 0; opacity: 0.9;">Thank you for choosing our yoga products, {{ $orderData['name'] }}!</p>
        </div>
        
        <div class="content">
            <h2 style="color: #059669; margin-bottom: 20px;">Order Details</h2>
            
            <div style="background: #f0fdf4; padding: 15px; border-radius: 8px; margin-bottom: 25px;">
                <p style="margin: 0 0 8px 0;"><strong>Customer:</strong> {{ $orderData['name'] }}</p>
                <p style="margin: 0 0 8px 0;"><strong>Email:</strong> {{ $orderData['email'] }}</p>
                @if($orderData['phone'])
                    <p style="margin: 0 0 8px 0;"><strong>Phone:</strong> {{ $orderData['phone'] }}</p>
                @endif
                @if($orderData['company'])
                    <p style="margin: 0;"><strong>Company:</strong> {{ $orderData['company'] }}</p>
                @endif
            </div>

            @if($orderData['address'])
            <div style="background: #f0fdf4; padding: 15px; border-radius: 8px; margin-bottom: 25px;">
                <h3 style="margin: 0 0 10px 0; color: #059669;">Shipping Address</h3>
                <p style="margin: 0;">
                    {{ $orderData['address'] }}<br>
                    @if($orderData['city']){{ $orderData['city'] }}, @endif
                    @if($orderData['state']){{ $orderData['state'] }} @endif
                    @if($orderData['postal_code']){{ $orderData['postal_code'] }}<br>@endif
                    @if($orderData['country']){{ $orderData['country'] }}@endif
                </p>
            </div>
            @endif

            <h3 style="color: #059669; margin-bottom: 20px;">Yoga Products Ordered</h3>
            
            @foreach($cart as $item)
                <div class="order-item">
                    <div class="product-info">
                        <div class="product-name">{{ $item['name'] }}</div>
                        <div class="product-details">
                            Quantity: {{ $item['quantity'] }} × ${{ number_format($item['price'], 2) }}
                        </div>
                    </div>
                    <div class="price">${{ number_format($item['price'] * $item['quantity'], 2) }}</div>
                </div>
            @endforeach

            <div class="total-section">
                <div class="total-row">
                    <span><strong>Subtotal:</strong></span>
                    <span>${{ number_format($total, 2) }}</span>
                </div>
                <div class="total-row">
                    <span><strong>Shipping:</strong></span>
                    <span>$10.00</span>
                </div>
                <div class="total-row total-final">
                    <span>Total Amount:</span>
                    <span>${{ number_format($total + 10, 2) }}</span>
                </div>
            </div>

            <div style="background: #eff6ff; padding: 20px; border-radius: 8px; border-left: 4px solid #3b82f6;">
                <h4 style="margin: 0 0 10px 0; color: #1e40af;">What's Next?</h4>
                <p style="margin: 0 0 10px 0;">• We'll process your order within 1-2 business days</p>
                <p style="margin: 0 0 10px 0;">• You'll receive a tracking number once your order ships</p>
                <p style="margin: 0;">• Expected delivery: 3-5 business days</p>
            </div>
        </div>

        <div class="footer">
            <p style="margin: 0 0 10px 0;">Questions about your order? Contact us at <strong>support@yogastore.com</strong></p>
            <p style="margin: 0; font-size: 14px;">Thank you for supporting your wellness journey with us! 🙏</p>
        </div>
    </div>
</body>
</html>