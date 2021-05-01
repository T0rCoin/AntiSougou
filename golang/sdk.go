package AntiSougou

import (
	"encoding/json"
	"fmt"
	"io/ioutil"
	"net/http"
)

var (
	Link string
)

const(
	BotToken string = ""
)

type Group struct {
	Ok     bool `json:"ok"`
	Result struct {
		User struct {
			Id           int    `json:"id"`
			IsBot        bool   `json:"is_bot"`
			FirstName    string `json:"first_name"`
			Username     string `json:"username"`
			LanguageCode string `json:"language_code"`
		} `json:"user"`
		Status string `json:"status"`
	} `json:"result"`
}

func Captcha(chatID int) (int,error) {
	Link = fmt.Sprintf("https://api.telegram.org/bot%s/getChatMember?chat_id=@Sougou111&user_id=%v", BotToken, chatID)
	response, err := http.Get(Link)
	if err != nil {
		return 0, err
	}
	defer response.Body.Close()
	Body, err := ioutil.ReadAll(response.Body)
	if err != nil {
		return 0, err
	}
	var JSON Group
	err = json.Unmarshal(Body, &JSON)
	if err != nil {
		return 0, err
	}
	if JSON.Ok != true {
		return 0, nil
	}
	if JSON.Result.Status == "left" || JSON.Result.Status == "kicked" {
		return 1, nil
	}
	return 0, nil
}
