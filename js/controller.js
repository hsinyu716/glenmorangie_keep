var app = angular.module("myApp", ['ngSanitize']);

app.controller("indexCtrl", function($scope, $http, $sce) {
	$scope.tab = 0;

	$scope.show_tab = function(o){
		$scope.tab = o;
	};

	$scope.share = function() {
		_show($('#loading'));
		$http({
			method: 'POST',
			url: shareurl,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			}
		}).success(function(data) {
			_show($('#loading'));
			if (data.success) {
				$scope.show_tab(5);
				$scope.$apply();
				// show_toastr('toast-top-right', 'success', '分享完成！', '');
				// setTimeout(function(){
				// 	location.href=dataurl;
				// },3000);
			}
		});
	}

	$scope.master = {};
 
	$scope.reset = function(o) {
		if(o==1){
			$scope.user = angular.copy($scope.master);	
		}else if(o==2){
			$scope.user2 = angular.copy($scope.master);	
		}
	};

	$scope.buymodel = 1;
	//自己的資料
	$scope.submit_ = function() {
		if (!checkform($('#data_form .required'),$('#agree'))) {
			return;
		}

		_show($('#loading'));
		$http({
			method: 'POST',
			url: setDataurl,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
			data:$('#data_form').serialize()
		}).success(function(data) {
			_show($('#loading'));
			if($scope.buymodel == 1){
				$scope.show_tab(6);
			}else{
				$scope.show_tab(7);
			}
		});
	}
	//朋友的資料
	$scope.submit2_ = function() {
		if (!checkform($('#data_form2 .required'),$('#agree2'))) {
			return;
		}
		_show($('#loading'));
		$http({
			method: 'POST',
			url: setDataurl,
			headers: {
				'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
			},
			data:$('#data_form2').serialize()
		}).success(function(data) {
			_show($('#loading'));
			$scope.show_tab(6);
		});
	}
});

