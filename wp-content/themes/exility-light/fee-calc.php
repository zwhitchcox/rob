
<!DOCTYPE html>
<html lang="en" ng-app>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

    <title>Ashworth Firm Closing Calculator</title>

    <!-- Bootstrap core CSS -->
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add custom CSS here -->
    <style>
		#top{background-color:#8FBE00;margin-bottom:40px;padding-top:60px;padding-bottom:30px;border-bottom:1px solid #666;-moz-box-shadow:0px 3px 0px rgba(0, 0, 0, 0.2);-webkit-box-shadow:0px 3px 0px rgba(0, 0, 0, 0.2);box-shadow:0px 3px 0px rgba(0, 0, 0, 0.2);}
		#top h1{font-size:4em;margin-bottom:20px;margin-top:50px;color:#FFF;-moz-text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);-webkit-text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);}
		#top p{font-size:1.5em;color:#F9F2E7;-moz-text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);-webkit-text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);text-shadow:0px -1px 0px rgba(0, 0, 0, 0.5);}
		.share {
			position: absolute;
			right: 30px;
			color: white;
		}
		h2 {margin-bottom:30px;}
		.control-label {
			font-size: 1.5em;
			color: #00A8C6;
			padding-bottom: 15px;
		}
		li {
			list-style-type: none;
		}
    </style>

</head>

<body>
	<div id="top">
	<div class="container">
	<div class="share">Share this: <a href="mailto:?subject=I wanted you to see this site&amp;body=Check out this closing calculator http://www.ashworthfirm.com." title="Share by Email"><img src="http://png-2.findicons.com/files/icons/573/must_have/48/mail.png"/></a></div><! .share >
	
	<h1>Ashworth Firm Closing Calculator</h1>
	<p>A simple way to calculate closing costs</p>
	</div><!-- .container -->
	</div><!-- #top -->
	<div class="container" ng-controller="AddUserController">
	<form name='addUserForm' class="form-horizontal css-form" role="form">
	<div class="page page0" ng-show="page==0">
	<div class="row">
	<h2 class="col-lg-offset-1">General Information</h2>
	<div class="col-lg-5">
		<div class="form-group">
		<label class="control-label">What is your name?</label>
		<input type="text" class="form-control" placeholder="John Smith" ng-model='to' required>
		</div>
		<div class="form-group">
		<label class="control-label">What is the property address?</label>
		<div class="row">
		<div class="col-lg-6">
		<input type="text" class="form-control" placeholder="123 Fleet St." ng-model='propertyAddress1' required>
		</div>
		<div class="col-lg-6">
		<input type="text" class="form-control" placeholder="Nashville, TN 37064" ng-model='propertyAddress2' required>
		</div>
		</div><! .row >
		</div>
		<div class="form-group">
		<label class="control-label">What is your role?</label>
		<select class="form-control" ng-model='loanType'>
			<option value="buyer">Buyer</option>
			<option value="builderBuyer">Builder/Buyer</option>
			<option value="lender">Lender</option>
			<option value="seller">Seller</option>
			<option value="realtor">Real Estate Agent</option>
		</select>
		</div>
		<div class="form-group">
		<label class="control-label">Please select the title product:</label>
		<select class="form-control" ng-model='loanType'>
			<option value="titleOpinionLetter">Title Opinion Letter</option>
			<option value="policies">Title Policies</option>
		</select>
		</div>
		<div class="form-group">
		<label class="control-label">What type of transaction is this?</label>
		<select class="form-control" ng-model='loanType'>
			<option value="purchaseSale">Purchase/Sale</option>
			<option value="refinance">Refinance</option>
		</select>
		</div>
		<div class="form-group">
			<label class="control-label">What is the sale price of the property?</label>
			<div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="number" class="form-control" placeholder="9000" ng-min='0' ng-model='salePrice' required>
			</div>
		</div>
		<div class="form-group" class="col-lg-offset-1">
		<label class="control-label">What is the amount of the loan?</label>
		<div class="input-group">
		<span class="input-group-addon">$</span>
		<input type="number" class="form-control" placeholder="7000" ng-min='0' ng-model='loanAmount' ng-change='computeOriginationAmount()' required>
		</div>
		</div>
		<div class="form-group">
		<label class="control-label">Will you be financing?</label>
		<select class="form-control" ng-model='policyType'>
			<option value="yes">Yes</option>
			<option value="no">No</option>
		</select>
		</div>
		

		<div class="form-group">
		<label class="control-label">What is the estimated closing date of the deal?</label>
		<input type="date" class="form-control" placeholder="{{today}}" ng-model='estClosingDate' required>
		</div>
		<div class="form-group">
		<label class="control-label">Who is the borrower?</label>
		<input type="text" class="form-control" placeholder="John Smith" ng-model='borrower' required>
		</div>
	</div><! .col >
	<div class="col-lg-5 col-lg-offset-1">
		<div class="form-group">
		<label class="control-label">What type of loan is this?</label>
		<select class="form-control" ng-model='loanType'>
			<option value="fha">FHA</option>
			<option value="va">VA</option>
			<option value="rhs">RHS</option>
			<option value="convIns">Conv. Ins.</option>
			<option value="convUnins">Conv. Unins.</option>
			<option value="constructionLoan">Construction Loan</option>
			<option value="refinance">Refinance</option>
		</select>
		</div>
		
		<div class="form-group">
		
		<label class="control-label"><input type="checkbox" ng-model="priorLiabilityExists"> Is there a prior liability on the property?</label>
		<div ng-show="priorLiabilityExists">
		<label class="control-label">What is the amount of the prior liability?</label>
		<input type="number" class="form-control" placeholder="4000" ng-min='0' ng-model='priorLiabilityAmount' required>
		</div>
		</div>
		<div class="form-group">
			<label class="control-label">What is the age of the prior policy?</label>
			<div class="input-group col-lg-3">
			<input type="number" class="form-control" placeholder="7" ng-model='priorPolicyAge' ng-min='0' required>
			<span class="input-group-addon">years</span>
			</div>
		</div>
	</div><! .col >
	</div><! .row>
	</div><!.page1>
	<div class="page page1" ng-show="page==1">
	<div class="row">
	<h2 class="col-lg-offset-1">Bank's Fees</h2>
	<div class="col-lg-5">
	<div class="form-group">
		<label class="control-label">What is the name of the lender?</label>
		<input type="text" class="form-control" placeholder="Bank of America" ng-model='lenderName' required>
		</div>
		<div class="form-group">
		<label class="control-label">What is the address of the lender?</label>
		<div class="row">
		<div class="col-lg-6">
		<input type="text" class="form-control" placeholder="123 Fleet St." ng-model='lenderAddress1' required>
		</div>
		<div class="col-lg-6">
		<input type="text" class="form-control" placeholder="Nashville, TN 37064" ng-model='lenderAddress2' required>
		</div>
		</div><! .row >
		</div>
		<div class="form-group">
			<label class="control-label">What is the origination percentage or amount?</label>
			<div class="row">
			<div class="col-lg-6">
			<div class="input-group">
			<input type="number" class="form-control" placeholder="" ng-model='originationPercentage' ng-change='computeOriginationAmount()' required>
			<span class="input-group-addon">%</span>
			</div>
			</div>
			<div class="col-lg-6">
			<div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="number" class="form-control" placeholder="Origination Amount" ng-model='originationAmount' ng-change='computeOriginationPercentage()' required>
			</div><! .input-group >
			</div><! .col-lg-6 >
			</div><! .row >
		</div><! .form-group>
		<div class="form-group">
		<label class="control-label">How much is the appraisal fee?</label>
		<input type="number" class="form-control" placeholder="40" ng-min='0' ng-model='appraisalFee' required>
		</div>
		<div class="form-group">
		<label class="control-label">How much is the flood certification fee?</label>
		<input type="number" class="form-control" placeholder="40" ng-min='0' ng-model='floodCertificationFee' required>
		</div>
		<div class="form-group">
		<label class="control-label">How much is the termite inspection fee?</label>
		<input type="number" class="form-control" placeholder="40" ng-min='0' ng-model='termiteInspectionFee' required>
		</div>
	</div><! .col >
	<div class="col-lg-5 col-lg-offset-1">
		<div class="form-group">
		<label class="control-label">How much is the credit report fee?</label>
		<input type="number" class="form-control" placeholder="40" ng-min='0' ng-model='creditReport' required>
		</div>
		<div class="form-group">
		<label class="control-label">How much is the Tax Service fee?</label>
		<input type="number" class="form-control" placeholder="40" ng-min='0' ng-model='taxService' required>
		</div>
		<div class="form-group">
		<label class="control-label">Any other bank fees?</label>
		<ul>
            <li ng-repeat="fee in otherBankFees">
			<div class="row">
			<div class="col-lg-5">
			<input type="text" class="form-control" placeholder="Weed Wacking" ng-model='fee.name' required>
			</div>
			<div class="col-lg-5">
			<div class="input-group">
			<span class="input-group-addon">$</span>
			<input type="number" class="form-control" placeholder="600" ng-model='fee.amount' required>
			</div><! .input-group >
			</div><! .col-lg-6 >
			<div class="col-lg-2">
			<button class="btn btn-default btn-sm" ng-click="removeOtherBankFee($index);"><span class="glyphicon glyphicon-minus"></span></button>
			</div>
			
			</div><! .row >
			</li>
      </ul>
      <button class="btn btn-default btn-sm" ng-click="addOtherBankFee();"><span class="glyphicon glyphicon-plus"></span> Add</button>
      </div><! form-group>
	</div><! .col >
	</div><! .row>
	</div><!.page1>
	<div class="page page2" ng-show="page==2">
	<div class="row">
	<h2 class="col-lg-offset-1">Recording Fees</h2>
	<div class="col-lg-5">
		<div class="form-group">
			<label class="control-label">How many pages is the deed of trust?</label>
			<input type="number" class="form-control" placeholder="2" ng-min='0' ng-model='DTPages' required>
			<div class="row">
			<div class="col-lg-6">D/T Fee: {{DTPages*5+3}}</div>
			<div class="col-lg-6">Tax/Stamps: {{(loanAmount-2000)*.00115}}</div>
			</div><! row>
		</div><! .form-group>
		<div class="form-group">
			<label class="control-label">How many pages is the warranty deed?</label>
			<input type="number" class="form-control" placeholder="2" ng-min='0' ng-model='WDPages' required>
			<div class="row">
			<div class="col-lg-6">W/D Fee: {{WDPages*5+3}}</div>
			<div class="col-lg-6">Tax/Stamps: {{WDPages*.0037}}</div>
			</div><! row>
		</div><! .form-group>
		<div class="form-group">
			<label class="control-label">How many pages is the quitclaim deed?</label>
			<input type="number" class="form-control" placeholder="2" ng-min='0' ng-model='QCDPages' required>
			<div class="row">
			<div class="col-lg-12">QC/D Fee: {{QCDPages*5+2}}</div>
			</div><! row>
		</div><! .form-group>
	</div><! .col >
	<div class="col-lg-5 col-lg-offset-1">
		<div class="form-group">
			<label class="control-label">Will any documents need to be released?</label>
			<input type="number" class="form-control" placeholder="2" ng-min='0' ng-model='releaseInstruments' required>
			<div class="row">
			<div class="col-lg-12">Release Fee: {{releaseInstruments*5+7}}</div>
			</div><! row>
		</div><! .form-group>
		<div class="form-group">
			<label class="control-label">How many powers of attorney will be recorded?</label>
			<input type="number" class="form-control" placeholder="2" ng-min='0' ng-model='powersOfAttorney' required>
			<div class="row">
			<div class="col-lg-12">Powers of Attorney Fee: {{powersOfAttorney*12}}</div>
			</div><! row>
		</div><! .form-group>
	</div><! .col >
	</div><! .row>
	</div><!.page2>
	<div class="page page3" ng-show="page==3">
	<div class="row">
	<h2 class="col-lg-offset-1">Other Fees</h2>
	<div class="col-lg-5">
		<div class="form-group">
			<label class="control-label"><input type="checkbox" ng-model='needsClosingProtectionLetter' required> Will you require a closing protection letter?</label>
		</div><! .form-group>
	</div><! .col >
	<div class="col-lg-5 col-lg-offset-1">
	</div><! .col >
	</div><! .row>
	</div><!.page3>
	<div class="page4" ng-show="page==4">
	<div class="row">
	
	</div><! .row>
	</div><!.page4>
	</form>
	<div class="row">
	<ul class="pager">
		<a class="btn btn-primary btn-md" ng-show="page" ng-click="page=page-1" role="button">Previous</a>
		<a class="btn btn-primary btn-md" ng-show="page<5" ng-click="page=page+1" role="button">Next</a>
	</ul>
	</div><! .row >

	</div><!-- .container -->
		<script>
	function AddUserController($scope) {
		$scope.$watch('salePrice',calculateTotalTitleInsurance);
		$scope.$watch('priorLiabilityAmount',calculateTotalTitleInsurance);
		$scope.$watch('loanAmount',calculateTotalTitleInsurance);
		$scope.$watch('needsClosingProtectionLetter',calculateTotalTitleInsurance);
		function calculateTotalTitleInsurance() {
			if ($scope.loanAmount>$scope.salePrice) {
				$scope.titleInsurance = computeTitleInsurance($scope.loanAmount);
			} else {$scope.titleInsurance = computeTitleInsurance($scope.salePrice)}
			if($scope.priorLiabilityExists) {
				$scope.titleInsurance -=.3*computeTitleInsurance($scope.priorLiabilityAmount);
			}
			if ($scope.loanAmount) $scope.titleInsurance+=50;
			if ($scope.needsClosingProtectionLetter) $scope.titleInsurance+=50;
		}


		function computeTitleInsurance(pivot) {
			var val = 0;
			pivot /=1000.0;
			if (pivot>0) {
				val+=200;
			}
			if (pivot>1) {
				if (pivot<100) {val+=(pivot-1)*6}
				else {val+=99*6;}
			}
			if (pivot>100) {
				if (pivot<500) {val+=(pivot-100)*4.5}
				else {val+=400*4.5;}
			}
			if (pivot>500) {
				if (pivot<1000) {val+=(pivot-500)*3}
				else {val+=500*3;}
			}
			if (pivot>1000) {
				if (pivot<5000) {val+=(pivot-1000)*2}
				else {val+=4000*2;}
			}
			if (pivot>5000) {
				if (pivot<10000) {val+=(pivot-5000)*1.5}
				else {val+=5000*1.5;}
			}
			if (pivot>10000) {
				if (pivot<=15000) {val+=(pivot-10000)*1.25}
				else {val+=5000*1.25;}
			}
			if (pivot>15000) {
				val+=(pivot-15000);
			}
			return val;
		}
		$scope.page = 0;
		$scope.otherBankFees=[{name:'',amount:0}];
		$scope.addOtherBankFee = function() {
			var newEmptyBankFee = {name:'', amount:0};
			$scope.otherBankFees.push(newEmptyBankFee);
		}
		$scope.removeOtherBankFee = function(index) {
			$scope.otherBankFees.splice(index,1);
		}
		
		$scope.computeOriginationAmount = function() {
			$scope.originationAmount = $scope.loanAmount * $scope.originationPercentage/100.0;
		}
		$scope.computeOriginationPercentage = function() {
			$scope.originationPercentage = $scope.loanAmount / $scope.originationAmount;
		}
		$scope.today= getTodaysDate();
		function getTodaysDate() {
			var today = new Date();
			var dd = today.getDate();
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			
			if(dd<10) {
			dd='0'+dd
			} 
			
			if(mm<10) {
			mm='0'+mm
			} 
			
			today = mm+'/'+dd+'/'+yyyy; 
			return today;
		}
	}
  </script>



    <!-- JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.8/angular.min.js"></script>
</body>

</html>
