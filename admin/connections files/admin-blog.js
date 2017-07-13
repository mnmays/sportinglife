
function google()
{
	google.load("gdata", "1.x");
google.setOnLoadCallback(getMyBlogFeed);

}

function logMeIn() {
  scope = "http://www.blogger.com/feeds/";
  var token = google.accounts.user.login(scope);
}

function setupMyService() {
  var myService =
    new google.gdata.blogger.BloggerService('exampleCo-exampleApp-1');
  logMeIn();
  return myService;
}

function logMeOut() {
  google.accounts.user.logout();
}