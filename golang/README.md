# How to use this SDK?

```
need:
  Golang => 1.14
```

### You only need to use the following code to complete simple access!

*If you can, you can create a folder independently to call it*

For example, if you put *sdk.go* in a folder named _*AntiSougou*_, you can call it in the *main* package of the project root directory

Suppose your project is named: *TEST*

```go
package main

import "TEST/AntiSougou"

func main(){
  //Variable chatID is telegram User Chat ID
  status, err := AntiSougou.Captcha(ChatID)
  if err != nil {
    //handle error
  }
  if status != 1 {
    return
    //If it returns a null value (0), the user is a member of the Sogou social engineering information database supergroup
  }
}

```
