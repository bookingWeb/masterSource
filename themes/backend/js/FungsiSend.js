function httpSend(target, data) {
	return $.ajax({
		url: target,
		type: 'POST',
		cache: false,
		dataType: 'JSON',
		data: data
	});
}

function httpSendGet(target, data){
	return $.ajax({
		url: target,
		type: 'GET',
		cache: false,
		dataType: 'json',
		data: data
	});
}

function httpSendPost(target, data){
	return $.ajax({
		url: target,
		type: 'POST',
		dataType: 'json',
		cache: false,
		data: data
	});
}

function httpSendMultiFormPost(target, data){
	return $.ajax({
		url: target,
		type: 'POST',
		dataType: 'json',
		cache: false,
		contentType: false,
		processData: false,
		data: data
	});
}