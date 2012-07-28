//number formating utility
function QxNumberStringToFloat(Value, ThousandSeparator, DecimalSeparator) {
	var A = new RegExp("["+ThousandSeparator+"]", "g");
	var ValueCleanIntegerPart = Value.replace(A, "");
	var B = new RegExp("["+DecimalSeparator+"]", "g");
	var Result = ValueCleanIntegerPart.replace(B, ".");
	Result = parseFloat(Result);

	var C = new RegExp("[\.]", "g");
	return Result.toString().replace(C,DecimalSeparator);
}
function StringToNumber(Value, ThousandSeparator, DecimalSeparator){
	var A = new RegExp("["+ThousandSeparator+"]", "g");
	var ValueCleanIntegerPart = Value.replace(A, "");
	var B = new RegExp("["+DecimalSeparator+"]", "g");
	var Result = ValueCleanIntegerPart.replace(B, ".");
	return parseFloat(Result);
}
function QxInt(Value) {
	return Math.floor(Value); 
}

function QxFrac(Value) {
	return Value - Math.floor(Value); 
}
function QxFloatRoundTo(Value, NumberOfDigits) {
	var FracPart = QxFrac(Value);
	var FracMultiplier = Math.pow(10, NumberOfDigits);
	var MultipliedFrac = FracPart * FracMultiplier;
	var RoundedMultipliedFrac = Math.round(MultipliedFrac);
	var RoundedFracPart = RoundedMultipliedFrac / FracMultiplier;
	return QxInt(Value) + RoundedFracPart;
}
function QxFloatToNumberString(Value, ThousandSeparator, DecimalSeparator, DecimalDigits) {
	//javascript always use . sign as decimal sign so we need to convert if we used different decimal sign .	
	if(isNaN(Value)){
		Value=Value.replace(DecimalSeparator,".");
	}
	
	var RoundedValue = QxFloatRoundTo(Value, DecimalDigits);
	var AbsValue = Math.abs(RoundedValue); 
	var ValueSign = (RoundedValue>=0?true:false); 
	var AbsValueAsString = AbsValue.toString();
	var p = AbsValueAsString.indexOf(".");
	
	if (p==-1) {
		var AbsValueFractionPartAsString = "";
		var AbsValueIntegerPartAsString = AbsValueAsString;
	}
	else {
		var AbsValueFractionPartAsString = AbsValueAsString.substr(p+1);
		var AbsValueIntegerPartAsString = AbsValueAsString.substr(0, p);
	}
    
	if (DecimalDigits==-1) {
		ResultFractionalPart = AbsValueFractionPartAsString;
	}
	else {
		while (AbsValueFractionPartAsString.length < DecimalDigits) {
			AbsValueFractionPartAsString = AbsValueFractionPartAsString + "0";
		}
		ResultFractionalPart = AbsValueFractionPartAsString.substr(0, DecimalDigits);
	}
	
	var l = AbsValueIntegerPartAsString.length;
	var ThousandSeparatorStartIndex = l%3;
	
	var j = ((ThousandSeparatorStartIndex==0)?3:ThousandSeparatorStartIndex);
	
	var ResultIntegerPart = "";
	for (var i=0; i<l; i++) {
		if (i==j) { 
			ResultIntegerPart = ResultIntegerPart + ThousandSeparator;
			j = j + 3;
		}
		ResultIntegerPart = ResultIntegerPart + AbsValueIntegerPartAsString.charAt(i);
	}
	var Result = ((ValueSign)?"":"-") + ResultIntegerPart + ((DecimalDigits==0)?"":(DecimalSeparator + ResultFractionalPart));
	return Result;
}

function _satuan(angka){
	if(angka=="1")return "satu";
	else if(angka=="2")return "dua";
	else if(angka=="3")return "tiga";
	else if(angka=="4")return "empat";
	else if(angka=="5")return "lima";
	else if(angka=="6")return "enam";
	else if(angka=="7")return "tujuh";
	else if(angka=="8")return "delapan";
	else if(angka=="9")return "sembilan";	
}
function _belasan(angka){
	if(angka.substr(angka.length-1,1)=="0")
		return "sepuluh";
	else if(angka.substr(angka.length-1,1)=="1")	
		return "sebelas";
	else
		return (_satuan(angka.substr(angka.length-1,1)) + " belas");
}
function _puluhan(angka){
	return (_satuan(angka.substr(0,1)) + " puluh ");
}
function _ratusan(angka){
	if(angka=="1")
		return "seratus ";
	else
		return (_satuan(angka) + " ratus ");
}
function _ribuan(angka){
	if(angka=="1")
		return "seribu ";
	else
		return (_satuan(angka) + " ribu ");
}
function _belasanribu(angka){
	return (_belasan(angka)+" ribu ");
}
function TerbilangRupiah(angka){

angka = new String(Math.round(angka));
panjang = angka.length;
kalimat = "";

	for(i=panjang;i>=1;i--){
		if(i==13){
			if(angka.substr(angka.length-i,1) != "0" ){
				kalimat = kalimat + _satuan(angka.substr(angka.length-i,1)) + " triliun ";
			}
		}
		else if(i==12){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i+1,1) == "0" && angka.substr(angka.length-i+2,1) == "0" ){
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1)) + " milyar ";
				}else{
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1));
				}
			}
		}
		else if(i==11){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i,1) == "1" ){
					kalimat = kalimat + _belasan(angka.substr(angka.length-i,2)) + " milyar ";
					i=i-1;
				}else{
					if(angka.substr(angka.length-i+1,1) == "0" ){
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2)) + " milyar ";
					}else{
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2));
					}
				}
			}
		}	
		else if(i==10){
			if(angka.substr(angka.length-i,1) != "0" ){
				kalimat = kalimat + _satuan(angka.substr(angka.length-i,1)) + " milyar ";
			}
		}
		else if(i==9){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i+2,1) == "0" && angka.substr(angka.length-i+1,1) == "0"){
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1)) + " juta ";
				}else{
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1));
				}
			}
		}
		else if(i==8){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i,1) == "1" ){
					kalimat = kalimat + _belasan(angka.substr(angka.length-i,2)) + " juta ";
					i=i-1;
				}else{
					if(angka.substr(angka.length-i+1,1) == "0" )
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2)) + " juta ";
					else
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2));
				}
			}
		}
		else if(i==7){
			if(angka.substr(angka.length-i,1) != "0" ){
				kalimat = kalimat + _satuan(angka.substr(angka.length-i,1)) + " juta ";
			}
		}
		else if(i==6){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i+1,1) == "0" ){
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1)) + " ribu ";
				}else{
					kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1));
				}
			}
		}
		else if(i==5){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i,1) == "1" ){
					kalimat = kalimat + _belasanribu(angka.substr(angka.length-i,2));
					i=i-1;
				}else{
					if(angka.substr(angka.length-i+1,1) == "0" ){
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2)) + " ribu ";
					}else{
						kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2));
					}
				}
			}
		}
		else if(i==4){
			if(angka.substr(angka.length-i,1) != "0" ){
				kalimat = kalimat + _ribuan(angka.substr(angka.length-i,1));
			}
		}
		else if(i==3){
			if(angka.substr(angka.length-i,1) != "0" ){
				kalimat = kalimat + _ratusan(angka.substr(angka.length-i,1));
			}
		}
		else if(i==2){
			if(angka.substr(angka.length-i,1) != "0" ){
				if(angka.substr(angka.length-i,1) == "1" ){
					kalimat = kalimat + _belasan(angka.substr(angka.length-i,2));
				}else{
					kalimat = kalimat + _puluhan(angka.substr(angka.length-i,2));
				}
			}
		}
		else if(i==1){
			if(angka.length != 1){
				if(angka.substr(angka.length-i-1,1) != "1" ){	
					if(angka.substr(angka.length-i,1)!="0"){
						kalimat = kalimat + _satuan(angka.substr(angka.length-i,1));
					}
				}
			}else{
				if(angka.substr(angka.length-i,1)=="0")
					kalimat = kalimat + " Nol ";
				else
					kalimat = kalimat + _satuan(angka);
			}
		}
	}
	return (kalimat+" rupiah");
}