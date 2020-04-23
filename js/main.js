let button = document.getElementById('button');

let letters = ['а', "е", "ё", "и", "о",
	 "у", "ы", "э", "ю", "я"];

button.onclick = function(){
	let value = document.getElementById('input').value.toLowerCase();
	for (let i = 0; i < value.length; i++) {
		console.log(value[i])
		for (let j = 0; j < letters.length; j++) {
			if (value[i] === letters[j]) {
				if (value.slice(i+1, i+3) === "с"+value[i]) {
					let result = value.slice(0, i+1) + value.slice(i+3)
					value = result;
				}
				break;
			}
		}
	}
	document.getElementById('result').innerHTML = value	
}