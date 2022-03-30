function add_sample() {
    const sample_list =
        [
            "#確認用URL",
            "````",
            "````",
            "##影響範囲",
            "````",
            "````",
            "###Controller",
            "````",
            "````",
            "###Models",
            "````",
            "````",
            "###blade_template",
            "````",
            "````",
            "##確認内容",
            "###Controller",
            "````",
            "````",
            "###Models",
            "````",
            "````",
            "###blade_template",
            "````",
            "````",
        ]

    for (let i = 0; i < sample_list.length; i++) {
        let pElement = document.createElement("p");
        let brElement = document.createElement("br");
        let newContent = document.createTextNode(sample_list[i]);

        pElement.appendChild(newContent);
        pElement.appendChild(brElement);
        pElement.setAttribute("id","sample_format"); // p要素にidを設定
        let parentDiv = document.getElementById("description");
        let childP1 = document.getElementsByClassName("empty-node");
        parentDiv.insertBefore(pElement, childP1.nextSibling);
    }
    alert("フォーマットを追加しました！！")
}

chrome.action.onClicked.addListener((tab) => {
    chrome.scripting.executeScript({
        target: {tabId: tab.id},
        function: add_sample
    });
});

