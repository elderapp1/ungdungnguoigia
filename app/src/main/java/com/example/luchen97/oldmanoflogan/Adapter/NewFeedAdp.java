package com.example.luchen97.oldmanoflogan.Adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.example.luchen97.oldmanoflogan.Activity.MainComment;
import com.example.luchen97.oldmanoflogan.Entries.NewFeed;
import com.example.luchen97.oldmanoflogan.Entries.NewFeedOfMe;
import com.example.luchen97.oldmanoflogan.R;
import com.example.luchen97.oldmanoflogan.Server.Server;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

/**
 * Created by LUCHEN97 on 3/20/2018.
 */

public class NewFeedAdp extends BaseAdapter {
    ArrayList<NewFeed> newFeeds;
    Context context;

    public NewFeedAdp(ArrayList<NewFeed> newFeeds, Context context) {
        this.newFeeds = newFeeds;
        this.context = context;
    }

    @Override
    public int getCount() {
        return newFeeds.size();
    }

    @Override
    public Object getItem(int position) {
        return newFeeds.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        viewhodler viewhodler = null;
        if (convertView == null) {
            viewhodler = new viewhodler();
            convertView = LayoutInflater.from(context).inflate(R.layout.listnewfeed, null);

            viewhodler.status = (TextView) convertView.findViewById(R.id.status_newfeed);
            viewhodler.imageView = (ImageView) convertView.findViewById(R.id.image_newfeed);
            viewhodler.like = (ImageView) convertView.findViewById(R.id.like_newfeed);
            viewhodler.comment = (ImageView) convertView.findViewById(R.id.comment_newfeed);
            viewhodler.avatar = (ImageView) convertView.findViewById(R.id.avatar_user);
            viewhodler.username = (TextView) convertView.findViewById(R.id.Username_user);
            final NewFeed newFeed = (NewFeed) getItem(position);
            // Toast.makeText(context, "n: " +newFeed.getId_user_newfeed(), Toast.LENGTH_SHORT).show();
            viewhodler.username.setText(newFeed.getUsername_user().toString());
            Picasso.with(context).load("http://" + Server.Localhost + "/oldman/assets/avatar/" + newFeed.getAvatar_user()).placeholder(R.drawable.profile).into(viewhodler.avatar);
            viewhodler.status.setText(newFeed.getStatus_newfeed().toString());
            Picasso.with(context).load("http://" + Server.Localhost + "/oldman/assets/newfeed/" + newFeed.getImage_newfeed()).placeholder(R.drawable.profile).into(viewhodler.imageView);
            viewhodler.comment.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    Intent intent = new Intent(context, MainComment.class);
                    intent.putExtra("id",newFeed.getId_newfeed());
                    context.startActivity(intent);
                }
            });
            viewhodler.like.setOnClickListener(new View.OnClickListener() {

                @Override
                public void onClick(View v) {

                }
            });

        }


        return convertView;
    }

    public class viewhodler {
        ImageView imageView, like, comment, avatar;
        TextView status, username;

    }
}
