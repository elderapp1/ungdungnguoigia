package com.example.luchen97.oldmanoflogan.Adapter;

import android.content.Context;
import android.content.Intent;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ImageView;
import android.widget.TextView;

import com.example.luchen97.oldmanoflogan.Activity.MainComment;
import com.example.luchen97.oldmanoflogan.Entries.NewFeedOfMe;
import com.example.luchen97.oldmanoflogan.Server.Server;
import com.example.luchen97.oldmanoflogan.R;
import com.squareup.picasso.Picasso;

import java.util.ArrayList;

/**
 * Created by LUCHEN97 on 3/20/2018.
 */

public class NewFeedOfMeAdp extends BaseAdapter {
    ArrayList<NewFeedOfMe> newFeeds;
    Context context;

    public NewFeedOfMeAdp(ArrayList<NewFeedOfMe> newFeeds, Context context) {
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
            convertView = LayoutInflater.from(context).inflate(R.layout.listviewcus, null);
            viewhodler.status= (TextView) convertView.findViewById(R.id.statusofme);
            viewhodler.imageView = (ImageView) convertView.findViewById(R.id.imageuploadofme);
            viewhodler.like = (ImageView) convertView.findViewById(R.id.likeofme);
            viewhodler.comment = (ImageView) convertView.findViewById(R.id.commentofme);
            NewFeedOfMe newFeed = (NewFeedOfMe) getItem(position);
           // Toast.makeText(context, "n: " +newFeed.getId_user_newfeed(), Toast.LENGTH_SHORT).show();
            viewhodler.status.setText(newFeed.getStatus_newfeed().toString());
            Picasso.with(context).load("http://"+ Server.Localhost+"/oldman/assets/newfeed/"+newFeed.getImage_newfeed()).placeholder(R.drawable.profile).into(viewhodler.imageView);
            viewhodler.comment.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {

                    Intent intent=new Intent(context, MainComment.class);
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
        ImageView imageView, like, comment;
        TextView status;

    }
}
