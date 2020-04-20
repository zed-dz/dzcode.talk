alias -- -="cd -"
alias .....="cd ../../../.."
alias ....="cd ../../.."
alias ...="cd ../.."
alias ..="cd .."
alias afk="/System/Library/CoreServices/Menu\ Extras/User.menu/Contents/Resources/CGSession -suspend"
alias afk2="i3lock -c 000000"
alias airport='/System/Library/PrivateFrameworks/Apple80211.framework/Versions/Current/Resources/airport'
alias c="tr -d '\\n' | xclip -selection clipboard"
alias c2="tr -d '\n' | pbcopy"
alias canary='/Applications/Google\ Chrome\ Canary.app/Contents/MacOS/Google\ Chrome\ Canary'
alias cd..="cd .."
alias cdb='cd $HOME/box/scotch-box'
alias cdp='cd $HOME/dzcode.talk'
alias cdtest='cd $HOME/dzcode.talk/test'
alias chrome='/Applications/Google\ Chrome.app/Contents/MacOS/Google\ Chrome'
alias chromekill="ps ux | grep '[C]hrome Helper --type=renderer' | grep -v extension-process | tr -s ' ' | cut -d ' ' -f2 | xargs kill"
alias clean='rm -rf ~/.Trash/*'
alias cleanup="find . -type f -name '*.DS_Store' -ls -delete"
alias cls='clear'
alias codep="code --proxy-server=\"http=$http_proxy;https=$https_proxy\" --proxy-bypass-list=\"localhost;127.0.0.1;*CORPORATE_DOMAIN\""
alias cp='cp -i'
alias cpv='cp -v'
alias cwd='pwd | tr -d "\r\n" | xclip -selection clipboard'
alias dl="cd ~/Downloads"
alias doco='docker-compose'
alias egrep='egrep --color=auto'
alias emptytrash="sudo rm -rfv /Volumes/*/.Trashes; sudo rm -rfv ~/.Trash; sudo rm -rfv /private/var/log/asl/*.asl; sqlite3 ~/Library/Preferences/com.apple.LaunchServices.QuarantineEventsV* 'delete from LSQuarantineEvent'"
alias fgrep='fgrep --color=auto'
alias flush="dscacheutil -flushcache && killall -HUP mDNSResponder"
alias ch='history | grep "git commit"'
alias g="git"
alias yolo='git push --force'
alias gac='git add -A && git commit -m'
alias gb='git branch'
alias gc='git commit -v'
alias gca='git commit -a'
alias gcb='git copy-branch-name'
alias gco='git checkout'
alias gd='git diff --color | sed "s/^\([^-+ ]*\)[-+ ]/\\1/" | less -r'
alias ge='git-edit-new'
alias git-stashpopforce='git stash show -p | git apply && git stash drop'
alias git-undopush='git push -f origin HEAD^:master'
alias gl='git pull --prune'
alias glog="git log --graph --pretty=format:'%Cred%h%Creset %an: %s - %Creset %C(yellow)%d%Creset %Cgreen(%cr)%Creset' --abbrev-commit --date=relative"
alias gp='git push origin HEAD'
alias greenkeeper-clean="git fetch -p && git branch --remote | fgrep greenkeeper | sed 's/^.\{9\}//' | xargs git push origin --delete"
alias gs='git status -sb' # upgrade your git if -sb breaks for you. it's fun.
alias grep='grep --color=auto'
alias h="history"
alias hg='history | grep'
alias hide="defaults write com.apple.finder AppleShowAllFiles -bool false && killall Finder"
alias hideFiles='defaults write com.apple.finder AppleShowAllFiles NO; killall Finder /System/Library/CoreServices/Finder.app'
alias hidedesktop="defaults write com.apple.finder CreateDesktop -bool false && killall Finder"
alias hosts='sudo $EDITOR /etc/hosts'
alias httpdump="sudo tcpdump -i en1 -n -s 0 -w - | grep -a -o -E \"Host\\: .*|GET \\/.*\""
alias ifactive="ifconfig | pcregrep -M -o '^[^\t:]+:([^\n]|\n\t)*status: active'"
alias ip="dig +short myip.opendns.com @resolver1.opendns.com"
alias ips="sudo ifconfig -a | grep -o 'inet6\\? \\(addr:\\)\\?\\s\\?\\(\\(\\([0-9]\\+\\.\\)\\{3\\}[0-9]\\+\\)\\|[a-fA-F0-9:]\\+\\)' | awk '{ sub(/inet6? (addr:)? ?/, \"\"); print }'"
alias l="ls -lhF ${colorflag}"
alias la="ls -lahF ${colorflag}"
alias ll='ls -l'
alias localip="sudo ifconfig | grep -Eo 'inet (addr:)?([0-9]*\\.){3}[0-9]*' | grep -Eo '([0-9]*\\.){3}[0-9]*' | grep -v '127.0.0.1'"
alias lscleanup="/System/Library/Frameworks/CoreServices.framework/Frameworks/LaunchServices.framework/Support/lsregister -kill -r -domain local -domain system -domain user && killall Finder"
alias lsd="ls -lhF ${colorflag} | grep --color=never '^d'"
alias map="xargs -n1"
alias mergepdf='/System/Library/Automator/Combine\ PDF\ Pages.action/Contents/Resources/join.py'
alias mv='mv -i'
alias mv2='mv -v'
alias oyt='open ~/Google\ Drive/YouTube/Scripts/'
alias path='echo -e ${PATH//:/\\n}'
alias pbcopy='xclip -selection clipboard'
alias pbpaste='xclip -selection clipboard -o'
alias phplint='find . -type f -name "*.php" -exec php -l {} \; | grep -v "No syntax errors"'
alias plistbuddy="/usr/libexec/PlistBuddy"
alias prikey="more ~/.ssh/id_ed25519 | xclip -selection clipboard | echo '=> Private key copied to pasteboard.'"
alias pubip="dig +short myip.opendns.com @resolver1.opendns.com"
alias pubkey="more ~/.ssh/id_ed25519.pub | xclip -selection clipboard | echo '=> Public key copied to pasteboard.'"
alias pumpitup="osascript -e 'set volume output volume 100'"
alias ram='ps aux | awk '"'"'{print $6/1024 " MB\t\t" $11}'"'"' | sort -rn | head -25'
alias reload="exec ${SHELL} -l"
alias sf='php app/console'
alias show="defaults write com.apple.finder AppleShowAllFiles -bool true && killall Finder"
alias showFiles='defaults write com.apple.finder AppleShowAllFiles YES; killall Finder /System/Library/CoreServices/Finder.app'
alias showdesktop="defaults write com.apple.finder CreateDesktop -bool true && killall Finder"
alias sniff="sudo ngrep -d 'en1' -t '^(GET|POST) ' 'tcp and port 80'"
alias sourcetree='open -a SourceTree'
alias spotoff="sudo mdutil -a -i off"
alias spoton="sudo mdutil -a -i on"
alias stfu="osascript -e 'set volume output muted true'"
alias timer='echo "Timer started. Stop with Ctrl-D." && date && time cat && date'
alias tut_env='source ~/tutorial_env/bin/activate'

alias untar='tar xvf'
alias update='sudo softwareupdate -i -a; brew update; brew upgrade; brew cleanup; npm install npm -g; npm update -g; sudo gem update --system; sudo gem update; sudo gem cleanup'
alias update_system='sudo softwareupdate -i -a'
alias urlencode='python -c "import sys, urllib as ul; print ul.quote_plus(sys.argv[1]);"'
alias vfix='sudo /sbin/rcvboxdrv setup'
alias vssh='cd $HOME/box/scotch-box && vagrant ssh && cd -'
alias vstop='cd $HOME/box/scotch-box && vagrant halt && cd -'
alias vup='cd $HOME/box/scotch-box && vagrant up && cd -'
alias week='date +%V'
alias wipe_env='rm -rf ~/tutorial_env; python3 -m venv ~/tutorial_env'
alias yt='subl ~/Google\ Drive/YouTube/Scripts/'
alias ~="cd ~" # `cd` is probably faster to type though

# To prep before screencasts
alias tut_mode='defaults write com.apple.dock autohide -bool true && killall Dock;
               defaults write com.apple.finder CreateDesktop -bool false && killall Finder;
               defaults write com.apple.menuextra.clock IsAnalog -bool true && killall SystemUIServer;
               rm -rf ~/.Trash/*;
               rm -rf ~/Downloads/*'
alias reg_mode='defaults write com.apple.dock autohide -bool false && killall Dock;
               defaults write com.apple.finder CreateDesktop -bool true && killall Finder;
               defaults write com.apple.menuextra.clock IsAnalog -bool false && killall SystemUIServer;'

# One of @janmoesen�s ProTip�s
for method in GET HEAD POST PUT DELETE TRACE OPTIONS; do
  alias "${method}"="lwp-request -m '${method}'"
done

# Make Grunt print stack traces by default
command -v grunt >/dev/null && alias grunt="grunt --stack"

# Canonical hex dump; some systems have this symlinked
command -v hd >/dev/null || alias hd="hexdump -C"

# macOS has no `md5sum`, so use `md5` as a fallback
command -v md5sum >/dev/null || alias md5sum="md5"

# macOS has no `sha1sum`, so use `shasum` as a fallback
command -v sha1sum >/dev/null || alias sha1sum="shasum"

# JavaScriptCore REPL
jscbin="/System/Library/Frameworks/JavaScriptCore.framework/Versions/A/Resources/jsc"
[ -e "${jscbin}" ] && alias jsc="${jscbin}"
unset jscbin

# One of @janmoesen’s ProTip™s
for method in GET HEAD POST PUT DELETE TRACE OPTIONS; do
  # shellcheck disable=SC2139,SC2140
  alias "$method"="lwp-request -m \"$method\""
done

# Check for various OS openers. Quit as soon as we find one that works.
for opener in browser-exec xdg-open cmd.exe cygstart "start" open; do
  if command -v $opener >/dev/null 2>&1; then
    if [[ "$opener" == "cmd.exe" ]]; then
      # shellcheck disable=SC2139
      alias open="$opener /c start"
    else
      # shellcheck disable=SC2139
      alias open="$opener"
    fi
    break
  fi
done

# Always use color output for `ls`
alias ls="command ls ${colorflag}"
export LS_COLORS='no=00:fi=00:di=04;35:ln=01;36:pi=40;33:so=01;35:do=01;35:bd=40;33;01:cd=40;33;01:or=40;31;01:ex=01;32:*.tar=01;31:*.tgz=01;31:*.arj=01;31:*.taz=01;31:*.lzh=01;31:*.zip=01;31:*.z=01;31:*.Z=01;31:*.gz=01;31:*.bz2=01;31:*.deb=01;31:*.rpm=01;31:*.jar=01;31:*.jpg=01;35:*.jpeg=01;35:*.gif=01;35:*.bmp=01;35:*.pbm=01;35:*.pgm=01;35:*.ppm=01;35:*.tga=01;35:*.xbm=01;35:*.xpm=01;35:*.tif=01;35:*.tiff=01;35:*.png=01;35:*.mov=01;35:*.mpg=01;35:*.mpeg=01;35:*.avi=01;35:*.fli=01;35:*.gl=01;35:*.dl=01;35:*.xcf=01;35:*.xwd=01;35:*.ogg=01;35:*.mp3=01;35:*.wav=01;35:'

# Detect which `ls` flavor is in use
if ls --color >/dev/null 2>&1; then # GNU `ls`
  colorflag="--color"
  export LS_COLORS='no=00:fi=00:di=01;31:ln=01;36:pi=40;33:so=01;35:do=01;35:bd=40;33;01:cd=40;33;01:or=40;31;01:ex=01;32:*.tar=01;31:*.tgz=01;31:*.arj=01;31:*.taz=01;31:*.lzh=01;31:*.zip=01;31:*.z=01;31:*.Z=01;31:*.gz=01;31:*.bz2=01;31:*.deb=01;31:*.rpm=01;31:*.jar=01;31:*.jpg=01;35:*.jpeg=01;35:*.gif=01;35:*.bmp=01;35:*.pbm=01;35:*.pgm=01;35:*.ppm=01;35:*.tga=01;35:*.xbm=01;35:*.xpm=01;35:*.tif=01;35:*.tiff=01;35:*.png=01;35:*.mov=01;35:*.mpg=01;35:*.mpeg=01;35:*.avi=01;35:*.fli=01;35:*.gl=01;35:*.dl=01;35:*.xcf=01;35:*.xwd=01;35:*.ogg=01;35:*.mp3=01;35:*.wav=01;35:'
else # macOS `ls`
  colorflag="-G"
  export LSCOLORS='BxBxhxDxfxhxhxhxhxcxcx'
fi

case "$TERM" in
xterm*)
  # The following programs are known to require a Win32 Console
  # for interactive usage, therefore let's launch them through winpty
  # when run inside `mintty`.
  for name in node ipython php php5 psql python2.7; do
    case "$(type -p "$name".exe 2>/dev/null)" in
    '' | /usr/bin/*) continue ;;
    esac
    alias $name="winpty $name.exe"
  done
  ;;
esac

# WTF 😇
# alias russian-roulette='[ $(( $RANDOM % 6 )) == 0 ] && rm -rf / || echo "You live"'

#################
#    PROXY      #
#################
enableProxy() {
  export http_proxy=$HTTPPROXY
  export https_proxy=$HTTPSPROXY
  export HTTP_PROXY=$HTTPPROXY
  export HTTPS_PROXY=$HTTPSPROXY

  npm config set proxy $HTTPPROXY
  npm config set https-proxy $HTTPPROXY
}

disableProxy() {
  unset http_proxy
  unset https_proxy
  unset HTTP_PROXY
  unset HTTPS_PROXY

  npm config delete proxy
  npm config delete https-proxy
}

# WTF Composer
disableHttpsProxyOnly() {
  export http_proxy=$URLPROXY
  export HTTP_PROXY=$URLPROXY
  export HTTP_PROXY REQUEST_FULLURI=true

  # http instead
  export https_proxy=$URLPROXY
  export HTTPS_PROXY=$URLPROXY
  export HTTPS_PROXY_REQUEST_FULLURI=false
}

# iMac + dual screen => 💔
dock() {
  defaults write com.apple.dock position-immutable -bool YES
  killall Dock
}

ds_fucking_store() {
  sudo find / -name ".DS_Store" -depth -exec rm {} \;
}

# HTTP/REST API
jsonapi() {
  http "$@" Accept:application/vnd.api+json Content-Type:application/vnd.api+json
}

pyserver() {
  if [[ $OSTYPE == darwin* ]]; then
    /usr/bin/open -a "/Applications/Google Chrome.app" 'http://127.0.0.1:8000/'
  else
    google-chrome "http://0.0.0.0:8000/"
  fi
  python -m SimpleHTTPServer 8000
}

# using: git-reset-author old-mail@mail.com
git-reset-author() {
  git filter-branch --env-filter '
    OLD_EMAIL="fsociety.2017@visma.com"
    CORRECT_NAME="Amine HAMMOU"
    CORRECT_EMAIL="fsociety.2017@protonmail.com"
    if [ "$GIT_COMMITTER_EMAIL" = "$OLD_EMAIL" ]
    then
        export GIT_COMMITTER_NAME="$CORRECT_NAME"
        export GIT_COMMITTER_EMAIL="$CORRECT_EMAIL"
    fi
    if [ "$GIT_AUTHOR_EMAIL" = "$OLD_EMAIL" ]
    then
        export GIT_AUTHOR_NAME="$CORRECT_NAME"
        export GIT_AUTHOR_EMAIL="$CORRECT_EMAIL"
    fi
    ' --tag-name-filter cat -- --branches --tags
}

git-standup() {
  AUTHOR=${AUTHOR:="$(git config user.name)"}

  since=yesterday
  if [[ $(date +%u) == 1 ]]; then
    since="2 days ago"
  fi

  git log --all --since "$since" --oneline --author="$AUTHOR"
}
