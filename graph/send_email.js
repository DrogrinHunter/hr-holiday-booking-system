const request = require("request");
const { Client } = require("@microsoft/microsoft-graph-client");
var masteraccesstoken;

const endpoint =
  "https://login.microsoftonline.com/2ad1a86a-8e4b-47f5-8f7b-04dc96f27f9b/oauth2/v2.0/token";
const requestParams = {
  grant_type: "client_credentials",
  client_id: "c7144120-2c39-4fb0-9c6d-abce07733a9d",
  client_secret: "G8_8Q~bEztufFeVu.j0cHdezLMgfV_RdZJuUdbPJ",
  scope: "https://graph.microsoft.com/.default",
};

request.post(
  { url: endpoint, form: requestParams },
  function (err, response, body) {
    if (err) {
      console.log("error");
    } else {
      //console.log("Body=" + body);
      let parsedBody = JSON.parse(body);
      if (parsedBody.error_description) {
        console.log("Error=" + parsedBody.error_description);
      } else {
        // console.log("Access Token=" + parsedBody.access_token);
        masteraccesstoken = parsedBody.access_token;
        //console.log("")

        var arg = process.argv;
        var base64str = arg[2];
        var str = Buffer.from(base64str, "base64"); // Ta-da

        sendmessage(parsedBody.access_token, str);
      }
    }
  }
);

async function sendmessage(accessToken, str) {
  var str = JSON.parse(str);

  var bodyhtml = str["body"];
  var toemail = str["toemail"];

  var jsonstr = {
    message: {
      subject: str["subject"],
      body: {
        contentType: "HTML",
        content: bodyhtml,
      },
      toRecipients: [
        {
          emailAddress: {
            address: toemail,
          },
        },
      ],
    },
    saveToSentItems: "false",
  };

  request.post(
    {
      headers: {
        "content-type": "application/json",
        Authorization: "Bearer " + accessToken,
      },
      json: true,
      url: "https://graph.microsoft.com/v1.0/users/helpdesk@mfm-it.co.uk/sendMail",
      body: jsonstr,
    },
    function (error, response, body) {
      console.log(body);
    }
  );
}
