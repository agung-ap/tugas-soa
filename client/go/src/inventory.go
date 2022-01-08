package main

import (
    "fmt"
    "io/ioutil"
    "log"
    "net/http"
    "os"
)

func main() {
    response, err := http.Get("http://host.docker.internal:8000/users")

    if err != nil {
        fmt.Print(err.Error())
        os.Exit(1)
    }

    responseData, err := ioutil.ReadAll(response.Body)

    if err != nil {
        log.Fatal(err)
    }
    
    fmt.Println(string(responseData))
}