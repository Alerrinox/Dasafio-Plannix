function PokemonRequest(){
	var result = $document.getElementById('getPokemon');
	result.innerHTML = '';

	axios.get('https://jsonplaceholder.typicode.com/todos').then(function (response) {
		result.innerHTML = printResponseHTML(response);
	}).catch(function (error){
		result.innerHTML = printErrorHTML(error);
	});
}
function printResponseHTML (response){
	return  '<h4>Result: </h4>' +
			'<h5>Status: </h5>' +
			'<pre>' + response.status + ' ' + response.statusText + '</pre>' +
			'<h5>Headers: </h5>' +
			'<pre>' + JSON.stringify(response.headers, null, '\t') +
			'<h5>Data: </h5>' +
			'<pre>' + JSON.stringify(response.data, null, '\t') + '</pre>' 
}
function printErrorHTML (error){
	return  '<h4>Result: </h4>' +
			'<h5>Message: </h5>' +
			'<pre> '+ error.message + ' <pre>'+ 
			'<h5>Status: </h5>' +
			'<pre>' + error.response.status + ' ' + error.response.statusText + '</pre>' +
			'<h5>Headers: </h5>' +
			'<pre>' + JSON.stringify(error.response.headers, null, '\t') +
			'<h5>Data: </h5>' +
			'<pre>' + JSON.stringify(error.response.data, null, '\t') + '</pre>' 
}
