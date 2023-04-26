<div id="paypal-button"></div>
<script type="text/javascript" src="https://www.paypalobjects.com/api/checkout.js"></script>
<script type="text/javascript">
	paypal.Button.render({
		env: "sandbox",
		client:{
			sandbox:"AVNE6X1I4-TwjFms3WsoiSwoIwmB1whxk8kYqX-I58QocxE_jmyKx6naugF20dHuX1BSE73am6WfYCS5"
		},
		payment: function(data,actions){
			return actions.payment.create({
				transactions:[{
					amount:{
						total:"<?=$datos["precio"]?>",
						currency:"USD"
					}
				}]
			})
		},
		onAuthorize: function(data,actions){
			return actions.payment.execute().then(function(){
				window.location="confirmacion.php?pago="+data.paymentID+"&producto=<?=$datos['idproducto']?>"
			})
		}
	},"#paypal-button")
</script>