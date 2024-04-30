//======================text-area counting here===============================
const textAreaElement = document.querySelector("#message_details");
const characterCounterElement = document.querySelector("#character-counter");
const typedCharactersElement = document.querySelector("#typed-characters");
const maximumCharacters = 2000;
textAreaElement.addEventListener("input", (event) => {
    const typedCharacters = textAreaElement.value.length;
    if (typedCharacters > maximumCharacters) {
        return false;
    }
    typedCharactersElement.textContent = "Word Count: " + typedCharacters;
});
//////////////////////////
