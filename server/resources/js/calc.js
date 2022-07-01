const { replace, round } = require("lodash");

const calcScore = document.getElementById('calc-score');
calcScore.addEventListener('click', event => {
    let answerEnText = document.getElementById('answer-en').textContent;
    const correctEnText = document.getElementById('correct-en').textContent;

    const score = correctionSentence(answerEnText, correctEnText);
    console.log(score);

    const scoreDom = document.getElementById('score');
    scoreDom.append(`正答率${score}%`);

    console.log('sentenceResultId');
    console.log(sentenceResultId);

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: `/practice/${sentenceResultId}/score`, //web.phpのURLに合わせる
        type: "POST", //リクエストタイプ
        data: {
            score: score
        }, //Laravelに渡すデータ
    }).done(function (res) {
        console.log(res);
    }).fail(function () {
        console.log("通信に失敗しました");
    });
})

const correctionSentence = (answerEnText, correctEnText) => {
    loopAnswerEnText = answerEnText;
    loopAnswerEnText = loopAnswerEnText.split(' ');
    console.log(loopAnswerEnText);
    console.log(correctEnText);

    let correctArray = [];

    loopAnswerEnText.forEach((text, index) => {
        console.log(`text = ${text}`);
        const testRegexp = new RegExp('\\?');
        if (testRegexp.test(text)) {
            // ?を含む
            text = text.replace('?', '\\?');
        }
        const regexp = new RegExp(text);
        console.log(regexp);
        let isMatched = correctEnText.match(regexp);
        console.log(`isMatched = ${isMatched}`);
        if (isMatched === null) {
            // miss
            answerEnText = answerEnText.replace(text, `<span style="color: red;">${text}</span>`);
        } else {
            correctArray.push(text);
        }
        console.log(answerEnText);
        console.log(correctArray);
    });

    correctEnText = correctEnText.split(' ');
    console.log(correctArray.length);
    console.log(correctEnText.length);
    const score = Math.round(correctArray.length / correctEnText.length * 100);

    const answerEn = document.getElementById('answer-en');
    answerEn.innerHTML = answerEnText;

    return score;
}