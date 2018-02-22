<?php include_once('config.php'); ?>
<?php include_once('header.php'); ?>
<div class="text-center">
	<h1>Token Management API Endpoints</h1>

	<?php if(isset($_SESSION['msg'])){ ?>
		<p style="margin-top: 30px;">Response: <?php echo $_SESSION['msg']; ?></p>
		<?php unset($_SESSION['msg']); ?>
	<?php } ?>

	<ul>
		<li>
			<h2>System Turn On/Off</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="system"/>
				<label>Action: <select name="actionLabel"><option value="on">On</option><option value="off">Off</option></select></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>Owner Token Balance</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="ownerTokenBalance"/>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>User Token Balance</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="userTokenBalance"/>
				<label>User ID: <input type="text" name="userId" required/></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>Wallet Creation</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="wallet"/>
				<label>User ID: <input type="text" name="userId" required/></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>Transfer Tokens From Contract To Internal Wallet</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="transferTokens"/>
				<label>User ID: <input type="text" name="userId" required/></label>
				&nbsp;&nbsp;<label>Token Amount: <input type="text" name="tokenAmount" required/></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>Transfer Tokens Between 2 Internal Wallets</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="transferTokensInternally"/>
				<label>From User ID: <input type="text" name="fromUserId" required/></label>
				&nbsp;&nbsp;<label>To User ID: <input type="text" name="toUserId" required/></label>
				&nbsp;&nbsp;<label>Token Amount: <input type="text" name="tokenAmount" required/></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>

		<li>
			<h2>Withdraw To Public Wallet</h2>
			<form action="" method="post">
				<input type="hidden" name="action" value="withdraw"/>
				<label>From User ID: <input type="text" name="userId" required/></label>
				&nbsp;&nbsp;<label>To ETH Address: <input type="text" name="address" required/></label>
				<input type="submit" value="Submit"/>
			</form>
		</li>
	</ul>
</div>
<?php include_once('footer.php'); ?>