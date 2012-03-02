#!/bin/sh
siriserver_pid=`ps ax | grep siriServer | grep -v grep | awk '{print $1}'`
echo $siriserver_pid

siriserver_uptime=`ps -p $siriserver_pid -o “%t” | tail -1`
echo $siriserver_uptime